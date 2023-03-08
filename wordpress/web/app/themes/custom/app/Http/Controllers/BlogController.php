<?php


namespace App\Http\Controllers;

use App\ViewModels\NewsStoryViewModel;
use Timber\Timber;

class BlogController extends \WP_REST_Controller
{
    public function __construct()
    {
       $this->namespace = '/pixo-blog/v1';
       $this->fullListing = 'full-listing';
       $this->single = 'single';
    }

    public function register_routes()
    {
       register_rest_route($this->namespace, '/' . $this->fullListing, array(
           array(
             'methods' => \WP_REST_Server::READABLE,
             'callback' => array($this, 'get_items'),
             'permission_callback' => array($this, 'get_items_permissions_check'),
             'args' => array(),
           ),
           'schema' => array( $this, 'get_item_schema' ),
       ));
        register_rest_route( $this->namespace, '/' . $this->single . '/(?P<id>[\d]+)', array(
            array(
                'methods'   => 'GET',
                'callback'  => array( $this, 'get_item' ),
                'permission_callback' => array( $this, 'get_item_permissions_check' ),
                'args' => array(),
            ),
            'schema' => array( $this, 'get_item_schema' ),
        ) );
    }

    public function hook_rest_server(){
        add_action( 'rest_api_init', array( $this, 'register_routes' ) );
    }

    public static function getListingQuery(): array
    {
        $query = [
            'post_type' => 'news',
            'posts_per_page' => 5
        ];

        return $query;
    }

    public function get_items($request)
    {
        $items = Timber::get_posts(self::getListingQuery());
        $data = [];

        if (empty($items)) {
            return rest_ensure_response( $data );
        }

        foreach ($items as $item) {
            $itemData = $this->prepare_item_for_response($item, $request);
            $data[] = $this->prepare_response_for_collection($itemData);
        }

        return new \WP_REST_Response($data, 200);
    }

    public function get_item( $request ) {
        $id = (int) $request['id'];
        $post = Timber::get_post( $id );

        if (empty($post)) {
            return rest_ensure_response( array() );
        }

        $response = $this->prepare_item_for_response( $post, $request );

        return $response;
    }

    public function get_items_permissions_check( $request ) {
        return true;
    }

    public function get_item_permissions_check( $request ) {
        return true;
    }

    public function prepare_item_for_response( $post, $request ) {
        $post_data = array();

        $schema = $this->get_item_schema( $request );

        if ( isset( $schema['properties']['id'] ) ) {
            $post_data['full'] = NewsStoryViewModel::createFromPost($post);
            $post_data['id'] = (int) $post->ID;
        }

        return rest_ensure_response( $post_data );
    }

    public function prepare_response_for_collection( $response ) {
        if ( ! ( $response instanceof WP_REST_Response ) ) {
            return $response;
        }

        $data = (array) $response->get_data();
        $server = rest_get_server();

        if ( method_exists( $server, 'get_compact_response_links' ) ) {
            $links = call_user_func( array( $server, 'get_compact_response_links' ), $response );
        } else {
            $links = call_user_func( array( $server, 'get_response_links' ), $response );
        }

        if ( ! empty( $links ) ) {
            $data['_links'] = $links;
        }

        return $data;
    }

    public function get_item_schema() {
        if ( $this->schema ) {
            return $this->schema;
        }

        $this->schema = array(
            '$schema'              => 'http://json-schema.org/draft-04/schema#',
            'title'                => 'post',
            'type'                 => 'object',
            'properties'           => array(
                'id' => array(
                    'description'  => esc_html__( 'Unique identifier for the object.', 'my-textdomain' ),
                    'type'         => 'integer',
                    'context'      => array( 'view', 'edit', 'embed' ),
                    'readonly'     => true,
                ),
                'content' => array(
                    'description'  => esc_html__( 'The content for the object.', 'my-textdomain' ),
                    'type'         => 'string',
                ),
            ),
        );

        return $this->schema;
    }
}

$controller = new BlogController();
$controller->hook_rest_server();

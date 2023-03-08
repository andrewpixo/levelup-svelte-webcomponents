<?php

use App\Tests\Mocks\UserFunctionMock;
use App\ViewModels\Components\TextComponentViewModel;
use WP_Mock\Tools\TestCase;

class TextTest extends TestCase
{
    public function setUp() : void
    {
        \WP_Mock::setUp();
    }

    public function tearDown() : void
    {
        \WP_Mock::tearDown();
    }

    public function testViewModelWithoutImage()
    {
        $post = [];

        $this->mockCommonData();
        UserFunctionMock::initializeUserFunctionMock($this->createTestPostWithoutImage());

        $viewModel = TextComponentViewModel::createFromPost($post);

        $this->assertEquals('Test Title', $viewModel->header);
        $this->assertEquals(false, $viewModel->hideHeader);
        $this->assertEquals('<a href="https://google.com">rich text link</a>', $viewModel->richText);
        $this->assertEquals(false, $viewModel->imageToggle);
    }

//    public function testViewModelWithImage()
//    {
//        $post = [];
//
//        $this->mockCommonData();
//
//        $imageMock = Mockery::mock('alias:ImageHelper');
//        $image = $this->getImage();
//        $imageMock->shouldReceive('createConditionalModel')->andReturn($image);
//        UserFunctionMock::initializeUserFunctionMock($this->createTestPostWithImage());
//
//        $viewModel = TextComponentViewModel::createFromPost($post);
//
//        $this->assertEquals('Test Title', $viewModel->header);
//        $this->assertEquals(false, $viewModel->hideHeader);
//        $this->assertEquals('<a href="https://google.com">rich text link</a>', $viewModel->richText);
//        $this->assertEquals(true, $viewModel->imageToggle);
//        $this->assertEquals('left', $viewModel->placement);
//        $this->assertEquals('third', $viewModel->width);
//    }

    public function createTestPostCommon()
    {
        $userFunctionMockValues = [
            'get_sub_field_object' => [
                'header' => true,
                'hide_header' => true,
                'rich_text' => true,
            ],
            'get_sub_field' => [
                'header' => 'Test Title',
                'hide_header' => false,
                'rich_text' => '<a href="https://google.com">rich text link</a>'
            ]
        ];

        return $userFunctionMockValues;
    }

    public function createTestPostWithoutImage()
    {
        $userFunctionMockValues = [
            'get_sub_field_object' => [
                'add_image' => true,
            ],
            'get_sub_field' => [
                'add_image' => false,
            ]
        ];

        return $userFunctionMockValues;
    }

    public function createTestPostWithImage()
    {
        $userFunctionMockValues = [
            'get_sub_field_object' => [
                'add_image' => true,
                'image'  => true,
                'image_alt_text' => true,
                'image_caption' => true,
                'placement' => true,
                'size' => true
            ],
            'get_sub_field' => [
                'add_image' => true,
                'image' => '43',
                'image_alt_text' => 'wow',
                'image_caption' => 'nature in its natural habitat',
                'placement' => 'left',
                'size' => 'third'
            ]
        ];

        return $userFunctionMockValues;
    }

    public function mockCommonData() {
        UserFunctionMock::initializeUserFunctionMock($this->createTestPostCommon());

        \WP_Mock::passthruFunction( 'wpautop', array( 'times' => 1 ) );
    }

    public function getImage() {
        $image = (object) [
            'object_type' => "image",
            'id' => 43,
            'ID' => 43,
            'guid' => "http'//buffalo-plaid.localhost/app/uploads/2021/07/Rectangle-45.png"
        ];

        return $image;
    }

}

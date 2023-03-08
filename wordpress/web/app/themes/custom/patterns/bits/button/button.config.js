module.exports = {
    title: 'Button',
    context: {
        text: 'Take action',
        url: '#',
        isDisabled: false,
    },
    variants: [
        {
            name: 'Disabled button',
            context: {
                isButton: true,
                isDisabled: true,
            }
        },        {
            name: 'Variant button',
            context: {
                variant: true
            }
        },
        {
            name: 'Submit button - full width',
            context: {
                isButton: true,
                type: 'submit',
                width: 'full'
            }
        },
    ]
}

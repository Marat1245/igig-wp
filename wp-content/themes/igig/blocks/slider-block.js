// slider-block.js
const { registerBlockType } = wp.blocks;
const { InnerBlocks } = wp.editor;

registerBlockType('your-namespace/slider-block', {
    title: 'Slider Block',
    icon: 'images-alt2',
    category: 'common',
    attributes: {
        slides: {
            type: 'number',
            default: 3,
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const { slides } = attributes;

        return (
            <div>
                <label>Number of Slides:</label>
                <input
                    type="number"
                    value={slides}
                    onChange={(event) => setAttributes({ slides: event.target.value })}
                />
                <InnerBlocks />
            </div>
        );
    },
    save: ({ attributes }) => {
        const { slides } = attributes;
        return <div>{`Number of Slides: ${slides}`}<InnerBlocks.Content /></div>;
    },
});
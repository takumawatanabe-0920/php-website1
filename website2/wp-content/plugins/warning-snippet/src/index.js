const { registerBlockType } = wp.blocks
const { RichText } = wp.blockEditor

registerBlockType('ourplugin/warning-snippet', {
  title: 'Warning Snippet',
  icon: 'warning',
  category: 'common',
  attributes: {
    content: {
      type: 'string',
      source: 'html',
      selector: 'div',
    },
  },
  edit: function (props) {
    function updateContent(value) {
      props.setAttributes({ content: value })
    }

    function updateHeading(value) {
      props.setAttributes({ heading: value })
    }

    return (
      <div className={props.className}>
        <RichText
          tagName='h2'
          value={props.attributes.heading}
          onChange={updateHeading}
          placeholder='Enter warning text here...'
        />
        <RichText
          tagName='div'
          value={props.attributes.content}
          onChange={updateContent}
          placeholder='Enter warning text here...'
        />
      </div>
    )
  },
  save: function (props) {
    return (
      <div
        style={{
          backgroundColor: '#fff3cd',
          border: '1px solid #ffeeba',
          padding: '20px',
          margin: '20px 0',
          borderRadius: '4px',
          color: '#856404',
          fontWeight: 'bold',
        }}
      >
        <div
          style={{
            marginBottom: '20px',
            fontSize: '1.5em',
          }}
        >
          <RichText.Content value={props.attributes.heading} />
        </div>
        <div>
          <RichText.Content value={props.attributes.content} />
        </div>
      </div>
    )
  },
})

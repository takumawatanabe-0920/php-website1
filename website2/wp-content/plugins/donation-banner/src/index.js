const { registerBlockType } = wp.blocks

registerBlockType('ourplugin/donation-banner', {
  title: 'Donation Banner',
  icon: 'money',
  category: 'common',
  edit: function () {
    return (
      <div className='donation-banner'>
        <p>Please support us with a $5 donation!</p>
        <a href='https://example.com/donate' className='donate-button'>
          Donate Now
        </a>
      </div>
    )
  },
  save: function () {
    return (
      <div className='donation-banner'>
        <p>Please support us with a $5 donation!</p>
        <a href='https://example.com/donate' className='donate-button'>
          Donate Now
        </a>
      </div>
    )
  },
})

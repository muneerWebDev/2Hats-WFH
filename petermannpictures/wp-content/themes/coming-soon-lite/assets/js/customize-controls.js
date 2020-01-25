( function( api ) {

	// Extends our custom "coming-soon-lite" section.
	api.sectionConstructor['coming-soon-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
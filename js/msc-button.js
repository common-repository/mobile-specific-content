(function() { 

  var file_frame;

    tinymce.PluginManager.add('msc_button', function( editor, url ) {
        editor.addButton( 'msc_button', {
            icon: 'icon msc_css_button',
            tooltip: 'Add a Specific Mobile Content shortcode',
            onclick: function() {
              currentcontent=tinymce.activeEditor.getContent();
              if(currentcontent.indexOf("[mobile-specific-content]") >= 0){

                                 tinyMCE.activeEditor.windowManager.alert('Sorry, shortcode can only be used once per post or page');

              }else{
                      
                                 editor.insertContent('[mobile-specific-content][/mobile-specific-content]');
                
              }

            }



        });
    });
})();
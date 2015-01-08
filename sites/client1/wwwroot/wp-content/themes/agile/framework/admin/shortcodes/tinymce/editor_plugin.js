(function(){
    tinymce.create( "tinymce.plugins.livemeshShortcodes", {

        init: function ( d, e ) {
            d.addCommand("livemeshPopup", function( a, params){
                var popup = params.identifier;

                // load thickbox
                tb_show("Insert Livemesh Shortcode", ajaxurl + "?action=livemesh_popup&popup=" + popup + "&width=" + 670 );
            });
        },

        createControl: function( d, e ){
            var ed = tinymce.activeEditor;

            if( d === "livemeshShortcodes" ){
                d = e.createMenuButton( "livemeshShortcodes", {
                    title: ed.getLang('livemesh.insert'),
                    icons: false
                });

                var a = this;
                d.onRenderMenu.add( function( c, b ) {

                    c = b.addMenu( { title:ed.getLang('livemesh.videos') } );
                    a.addWithPopup( c, ed.getLang('livemesh.ytp_video_showcase'), "ytp_video_showcase" );
                    a.addWithPopup( c, ed.getLang('livemesh.ytp_video_section'), "ytp_video_section" );
                    a.addWithPopup( c, ed.getLang('livemesh.video_showcase'), "video_showcase" );
                    a.addWithPopup( c, ed.getLang('livemesh.video_section'), "video_section" );
                    a.addWithPopup( c, ed.getLang('livemesh.audio'), "audio" );

                    c = b.addMenu( { title:ed.getLang('livemesh.portfolio_shortcodes') } );
                    a.addWithPopup( c, ed.getLang('livemesh.show_post_snippets'), "show_post_snippets" );
                    a.addWithPopup( c, ed.getLang('livemesh.show_portfolio'), "show_portfolio" );
                    a.addWithPopup( c, ed.getLang('livemesh.show_gallery'), "show_gallery" );

                    c = b.addMenu( { title:ed.getLang('livemesh.blog_posts_shortcodes') } );
                    a.addWithPopup( c, ed.getLang('livemesh.recent_posts'), "recent_posts" );
                    a.addWithPopup( c, ed.getLang('livemesh.popular_posts'), "popular_posts" );
                    a.addWithPopup( c, ed.getLang('livemesh.category_posts'), "category_posts" );
                    a.addWithPopup( c, ed.getLang('livemesh.tag_posts'), "tag_posts" );
                    a.addWithPopup( c, ed.getLang('livemesh.show_custom_post_types'), "show_custom_post_types" );

                    c = b.addMenu( { title:ed.getLang('livemesh.custom_post_type') } );
                    a.addWithPopup( c, ed.getLang('livemesh.pricing_plans'), "pricing_plans" );
                    a.addWithPopup( c, ed.getLang('livemesh.testimonials'), "testimonials" );
                    a.addWithPopup( c, ed.getLang('livemesh.testimonials2'), "testimonials2" );
                    a.addWithPopup( c, ed.getLang('livemesh.team'), "team" );
                    a.addWithPopup( c, ed.getLang('livemesh.team_slider'), "team_slider" );

                    b.addSeparator();

                    a.addWithPopup( b, ed.getLang('livemesh.button'), "button" );
                    a.addWithPopup( b, ed.getLang('livemesh.columns'), "columns" );
                    a.addWithPopup( b, ed.getLang('livemesh.contact_form'), "contact_form" );
                    a.addWithPopup( b, ed.getLang('livemesh.image'), "image" );


                    c = b.addMenu( { title:ed.getLang('livemesh.typography') } );
                    a.addWithPopup( c, ed.getLang('livemesh.segment'), "segment" );
                    a.addWithPopup( c, ed.getLang('livemesh.code'), "code" );
                    a.addWithPopup( c, ed.getLang('livemesh.list'), "list" );
                    a.addWithPopup( c, ed.getLang('livemesh.heading'), "heading" );
                    a.addWithPopup( c, ed.getLang('livemesh.wrap'), "wrap" );
                    a.addWithPopup( c, ed.getLang('livemesh.icon'), "icon" );
                    a.addWithPopup( c, ed.getLang('livemesh.action_call'), "action_call" );
                    a.addWithPopup( c, ed.getLang('livemesh.pullquote'), "pullquote" );
                    a.addWithPopup( c, ed.getLang('livemesh.blockquote'), "blockquote" );
                    a.addWithPopup( c, ed.getLang('livemesh.highlight1'), "highlight1" );
                    a.addWithPopup( c, ed.getLang('livemesh.highlight2'), "highlight2" );

                    
                    c = b.addMenu( { title:ed.getLang('livemesh.tabs_shortcodes') } );
                    a.addWithPopup( c, ed.getLang('livemesh.tabgroup'), "tabgroup" );
                    a.addWithPopup( c, ed.getLang('livemesh.toggle'), "toggle" );

                    c = b.addMenu( { title:ed.getLang('livemesh.slider_shortcodes') } );
                    a.addWithPopup( c, ed.getLang('livemesh.responsive_slider'), "responsive_slider" );
                    a.addWithPopup( c, ed.getLang('livemesh.device_slider'), "device_slider" );

                    c = b.addMenu( { title:ed.getLang('livemesh.social_shorcodes') } );
                    a.addWithPopup( c, ed.getLang('livemesh.social_list'), "social_list" );
                    a.addWithPopup( c, ed.getLang('livemesh.donate'), "donate" );
                    a.addWithPopup( c, ed.getLang('livemesh.subscribe_rss'), "subscribe_rss" );

                    c = b.addMenu( { title:ed.getLang('livemesh.miscellaneous_shortcodes') } );
                    a.addWithPopup( c, ed.getLang('livemesh.message'), "message" );
                    a.addWithPopup( c, ed.getLang('livemesh.box_frame'), "box_frame" );
                    a.addWithPopup( c, ed.getLang('livemesh.divider'), "divider" );
                    a.addWithPopup( c, ed.getLang('livemesh.clear'), "clear" );
                    a.addWithPopup( c, ed.getLang('livemesh.header_fancy'), "header_fancy" );


                    c = b.addMenu( { title:ed.getLang('livemesh.stats_shortcodes') } );
                    a.addWithPopup( c, ed.getLang('livemesh.skills'), "skills" );
                    a.addWithPopup( c, ed.getLang('livemesh.animate_numbers'), "animate_numbers" );
                    a.addWithPopup( c, ed.getLang('livemesh.piechart'), "piechart" );


                });

                return d;

            }
            return null;
        },

        addWithPopup: function (d, e, a){
            d.add({
                title: e,
                onclick: function() {
                    tinyMCE.activeEditor.execCommand( "livemeshPopup", false, {
                        title: e,
                        identifier: a
                    })
                }
            });
        },

        addImmediate:function(d,e,a){
            d.add({
                title:e,
                onclick:function(){
                    tinyMCE.activeEditor.execCommand( "mceInsertContent",false,a)
                }
            })
        }

    });

    tinymce.PluginManager.add( "livemeshShortcodes", tinymce.plugins.livemeshShortcodes);

})();

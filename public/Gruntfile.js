module.exports = function(grunt){

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("hh:MM:ss dd/mm/yyyy") %> */\n',
				report: 'gzip',
				mangle: false
            },
            site_layouts_auth_notIE: {
                src: [
					'assets/js/jquery-2.1.1.min.js',
					'assets/js/jquery-migrate-1.2.1.min.js',
					//'assets/js/bootstrap.min.js',
					//'assets/js/jquery.mmenu.min.js',
					//'assets/js/core.min.js',
					'assets/plugins/jquery-cookie/jquery.cookie.min.js'
					//'assets/js/demo.min.js'
				],
                dest: 'assets/build/js/auth.notIE.min.js'
            },
			site_layouts_auth_IE: {
                src: [
					'assets/js/jquery-1.11.1.min.js',
					'assets/js/jquery-migrate-1.2.1.min.js',
					//'assets/js/bootstrap.min.js',
					//'assets/js/jquery.mmenu.min.js',
					//'assets/js/core.min.js',
					'assets/plugins/jquery-cookie/jquery.cookie.min.js'
					//'assets/js/demo.min.js'
				],
                dest: 'assets/build/js/auth.IE.min.js'
            },
			partials_script_notIE: {
				src: [
					'assets/js/jquery-2.1.1.min.js',
					'assets/js/jquery-migrate-1.2.1.min.js',
					'assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js',
					'assets/js/jquery.mmenu.min.js',
					'assets/js/toastr.min.js',
					'assets/js/core.min.js',
					'assets/plugins/jquery-cookie/jquery.cookie.min.js',
					'assets/plugins/modernizr/modernizr.js',
					'assets/js/demo.min.js'
				],
				dest: 'assets/build/js/script_notIE.min.js'
			},
			partials_script_IE: {
				src: [
					'assets/js/jquery-1.11.1.min.js',
					'assets/js/jquery-migrate-1.2.1.min.js',
					'assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js',
					'assets/js/jquery.mmenu.min.js',
					'assets/js/toastr.min.js',
					'assets/js/core.min.js',
					'assets/plugins/jquery-cookie/jquery.cookie.min.js',
					'assets/plugins/modernizr/modernizr.js',
					'assets/js/demo.min.js'
				],
				dest: 'assets/build/js/script_IE.min.js'
			}
        },
		cssmin: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("hh:MM:ss dd/mm/yyyy") %> */\n',
				keepSpecialComments: '1',
				report: 'gzip'
			},
			site_layouts_auth: {
				files: {
					'assets/build/css/auth.min.css': [
						'assets/css/bootstrap.min.css',
						//'assets/css/jquery.mmenu.css',
						//'assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css',
						'assets/css/style.css'
						//'assets/css/add-ons.min.css'
						//'assets/css/themes.min.css'
					]
				}
			},
			partials_header: {
				files: {
					'assets/build/css/header.min.css': [
						'assets/css/jquery.mmenu.css',
						'assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css',
						'assets/plugins/fullcalendar/css/fullcalendar.css',
						'assets/css/toastr.min.css',
						'assets/css/style.css',
						'assets/css/add-ons.min.css',
						'assets/css/themes.min.css',
						'assets/me/ui-grid/ui-grid.css',
						'assets/angular/angular-csp.css'
					]
				}
			}
		}
		,compress: {
			main: {
				options: {
					//mode: 'gzip',
					archive: 'archive.zip'
				},
				files: {
					src: 'assets/build/css/auth.min.css',
					dest: 'assets/build/css/gzip/auth.min.css'
				}
			}
		}
    });
    grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.registerTask('default', ['uglify','cssmin']);
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-concat');
};
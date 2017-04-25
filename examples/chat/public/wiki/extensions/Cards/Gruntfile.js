module.exports = function ( grunt ) {
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-jscs' );
	grunt.loadNpmTasks( 'grunt-jsonlint' );
	grunt.loadNpmTasks( 'grunt-banana-checker' );
	grunt.loadNpmTasks( 'grunt-jsduck' );

	grunt.initConfig( {
		files: {
			js: 'resources/**/*.js'
		},
		banana: {
			all: 'i18n/'
		},
		jscs: {
			src: '<%= files.js %>'
		},
		jshint: {
			options: {
				jshintrc: true
			},
			all: [
				'<%= files.js %>'
			]
		},
		jsonlint: {
			all: [
				'*.json',
				'**/*.json',
				'!node_modules/**'
			]
		},
		jsduck: {
			all: {
				src: [
					'<%= files.js %>'
				],
				dest: 'docs',
				options: {
					title: 'Cards',
					external: [
						'mw.Api',
						'jQuery.Deferred',
						'jQuery',
						'OO.EventEmitter'
					],
					warnings: [
						'-nodoc(class,public)',
						'-dup_member',
						'-link_ambiguous'
					]
				}
			}
		}
	} );

	grunt.registerTask( 'lint', [ 'jshint', 'jscs', 'jsonlint', 'banana' ] );
	grunt.registerTask( 'test', [ 'lint' ] );
	grunt.registerTask( 'doc', [ 'jsduck' ] );
	grunt.registerTask( 'default', 'test' );
};

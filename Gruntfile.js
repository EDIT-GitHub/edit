module.exports = function(grunt) {
  grunt.initConfig({
    cmq: {
      options: {
        log: false
      },
      your_target: {
        files: {
          'output': ['css/*.css']
        }
      }
    }
  });
  grunt.loadNpmTasks('grunt-combine-media-queries');
  grunt.registerTask('default', 'cmq');
};
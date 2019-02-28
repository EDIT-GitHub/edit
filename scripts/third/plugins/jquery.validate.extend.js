//Requires jquery Validate Plugin
//Extends methods for validation.

var validator = {};
validator.modules = {};
validator.extend = {};
validator.extend.uploadValidator = function () {
    // Accept a value from a file input based on a required mimetype
    jQuery.validator.addMethod("accept", function (value, element, param) {
        // Split mime on commas in case we have multiple types we can accept
        var typeParam = typeof param === "string" ? param.replace(/\s/g, "").replace(/,/g, "|") : "image/*",
        optionalValue = this.optional(element),
        i, file;

        // Element is optional
        if (optionalValue) {
            return optionalValue;
        }

        if (jQuery(element).attr("type") === "file") {
            // If we are using a wildcard, make it regex friendly
            typeParam = typeParam.replace(/\*/g, ".*");

            // Check if the element has a FileList before checking each file
            if (element.files && element.files.length) {
                for (i = 0; i < element.files.length; i++) {
                    file = element.files[i];

                    // Grab the mimetype from the loaded file, verify it matches
                    if (!file.type.match(new RegExp(".?(" + typeParam + ")$", "i"))) {
                        return false;
                    }
                }
            }
        }

        // Either return true because we've validated each file, or because the
        // browser does not support element.files and the FileList feature
        return true;
    }, jQuery.validator.format("Please enter a value with a valid mimetype."));
    jQuery.validator.addMethod("validateUpload", function (value, element, param) {
        var isUpload = false;
        if (element.files) {
            isUpload = this.optional(element) || (element.files[0].size <= param);
        } else {
            isUpload = true;
        }


        return isUpload;
    }, jQuery.validator.format('File size exceeds limit.'))
}
validator.extend.bdateValidator = function () {
    ///<signature>
    ///<summary>This method adds validator methods for dates validation! The 'threeFieldBirthdate' requires an Array with the fields ids as parameter</summary>
    ///</signature>
    jQuery.validator.addMethod('threeFieldBirthdate', function (value, element, fields) {
        var valid = false;
        if ($('#' + fields[0] + '').val() != '' && $('#' + fields[1] + '').val() != '' && $('#' + fields[2] + '').val() != '') {
            var birthDay = parseInt($('#' + fields[0] + '').val(), 10);
            var birthMonth = parseInt($('#' + fields[1] + '').val(), 10);
            var birthYear = parseInt($('#' + fields[2] + '').val(), 10);

            var jDate = new Date(birthYear, birthMonth - 1, birthDay);
            var currentDate = new Date();
            valid = (
                birthMonth - 1 == jDate.getMonth() &&
                birthDay == jDate.getDate() &&
                    (birthYear == jDate.getFullYear() &&
                    birthYear > (currentDate.getFullYear() - 120) &&
                    birthYear <= (currentDate.getFullYear())
                    ) &&
                jDate.getTime() < currentDate.getTime()
                )
        }
        return this.optional(element) || valid;
    }, jQuery.validator.format('Birthdate not valid'))
    ///<signature>
    ///<summary>This method adds validator methods for dates validation! The 'threeFieldBirthdate' requires an Array with the fields ids as parameter</summary>
    ///</signature>
    jQuery.validator.addMethod('birthdate', function (value, element) {
        var valid = false;
        var toTest = value;
        toTest = toTest.split('/');
        var birthDay = toTest[0];
        var birthMonth = toTest[1];
        var birthYear = toTest[2];

        var jDate = new Date(birthYear, birthMonth - 1, birthDay);
        var currentDate = new Date();
        valid = (
            birthMonth - 1 == jDate.getMonth() &&
            birthDay == jDate.getDate() &&
                (birthYear == jDate.getFullYear() &&
                birthYear > (currentDate.getFullYear() - 120) &&
                birthYear <= (currentDate.getFullYear())
                ) &&
            jDate.getTime() < currentDate.getTime()
        )
        return this.optional(element) || valid;
    }, jQuery.validator.format('Birthdate not valid'))
    ///<signature>
    ///<summary>This method adds validator methods for future dates validation! The 'threeFieldBirthdate' requires an Array with the fields ids as parameter</summary>
    ///</signature>
    jQuery.validator.addMethod('threeFutureDate', function (value, element, fields) {
        var valid = false;
        if ($('#' + fields[0] + '').val() != '' && $('#' + fields[1] + '').val() != '' && $('#' + fields[2] + '').val() != '') {
            var birthDay = parseInt($('#' + fields[0] + '').val(), 10);
            var birthMonth = parseInt($('#' + fields[1] + '').val(), 10);
            var birthYear = parseInt($('#' + fields[2] + '').val(), 10);

            var jDate = new Date(birthYear, birthMonth - 1, birthDay);
            var currentDate = new Date();
            console.log(jDate.getTime())
            if (jDate.getTime() > currentDate.getTime()) {
                valid = (birthMonth - 1 == jDate.getMonth() && birthDay == jDate.getDate() && birthYear == jDate.getFullYear())
            }
        }
        return this.optional(element) || valid;
    }, jQuery.validator.format('Future date not valid'))
}
validator.extend.inputContentValidator = function () {
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        var rx = new RegExp("^[A-Za-z_ \u00C0-\u017F]+$");
        var val = value.trim();
        return this.optional(element) || rx.test(val);
    }, "Letters only please");

    jQuery.validator.addMethod("numbersonly", function (value, element) {
        var rx = new RegExp("^[0-9_ + ]+$");
        var val = value.trim();
        return this.optional(element) || rx.test(val);
    }, "Numbers only please");

    jQuery.validator.addMethod("oneselected", function (value, element) {
        var val = value;
        if (val != 'none') {
            return this.optional(element) || true;
        }
    }, "Numbers only please");
}

validator.modules.UPLOADS = 'uploads';
validator.modules.BDATES = 'bdates';
validator.modules.INPUTTYPE = 'inputtypes';

validator.modulealiases = [{ module: validator.modules.UPLOADS, reference: validator.extend.uploadValidator }, { module: validator.modules.BDATES, reference: validator.extend.bdateValidator }, { module: validator.modules.INPUTTYPE, reference: validator.extend.inputContentValidator }]
validator.initModules = function (modules) {
    ///<signature>
    ///<summary>This method initializes validator modules</summary>
    ///<param name="modules" type="array">The modules param is the array of modules to be initialized</param>
    ///</signature>
    //console.log(modules);
    for (var i = 0; i < modules.length; i++) {
        if (validator.modulealiases[i].module === modules[i]) {
            validator.modulealiases[i].reference();
        } else {
            throw new Error('The validator module you are initializing does not exist!');
        }
        if (i == modules.length - 1) {
            //validator.extendIEPlaceholder();
        }
    }
}
/*validator.extendIEPlaceholder = function () {
    if (!BrowserDetect.inited) BrowserDetect.init();
    if (BrowserDetect.BROWSER_NAME == "Explorer" && BrowserDetect.BROWSER_VERSION < 10) {
        $.each($.validator.methods, function (key, value) {
            $.validator.methods[key] = function () {
                var el = $(arguments[1]);
                if (el.is('[placeholder]') && arguments[0] == el.attr('placeholder'))
                    arguments[0] = '';

                return value.apply(this, arguments);
            };
        });
    }
}*/

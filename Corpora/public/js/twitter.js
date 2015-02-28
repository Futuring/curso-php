
$(document).ready(function() {

    "use strict";

    function dateFormatter(date) {
        return date.toTimeString();
    }

    twitterFetcher.fetch('510118249401286656', 'twitter', 2, false, false, true, 'default', false);

});
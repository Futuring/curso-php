
/*
*	Corpora Text Gallery v1.0
*	
*
*/

(function () {

    "use strict";

    var Corpora = {

        initTextGallery: function (arg) {

            var self = this;
            self.QTD = 0;
            self.count = 0;
            self.timer = null;
            self.delay = 3000;
            self.textElem = new Array();
            self.textBtnElem = new Array();

            self.btn_area = null;
            self.text_area = null;
            self.text_tag = "h2";
            self.btn_tag = "article";

            if (arg.text_tag != null) {

                self.btn_area = (typeof arg.btn_area == 'string') ? document.getElementById(arg.btn_area) : arg.btn_area;
                self.text_area = (typeof arg.text_area == 'string') ? document.getElementById(arg.text_area) : arg.text_area;
                self.text_tag = arg.text_tag;
                self.btn_tag = arg.btn_tag;
                self.delay = arg.delay;

                var bs = self.btn_area.getElementsByTagName(self.btn_tag);
                var ts = self.text_area.getElementsByTagName(self.text_tag);

                for (var i = 0; i < bs.length; i++) {

                    self.textElem[i] = ts[i];
                    self.textBtnElem[i] = bs[i];

                    //self.addEvent('click', function (i) { self.setTextPos(i) }, bs[i]);
                    
                    self.QTD += 1;
                }

                self.timer = window.setInterval(function () { self.changeText(); }, self.delay);

            }
        },

        changeText: function () {

            var self = this;

            if ((self.count) == (self.QTD - 1)) {

                $(self.textElem[0]).fadeIn(300);
                $(self.textElem[self.count]).fadeOut(300);

                self.textBtnElem[0].className = 'on';
                self.textBtnElem[self.count].className = 'off';
                self.count = 0;
            }
            else {

                self.count++;
                $(self.textElem[self.count]).fadeIn(300);
                $(self.textElem[self.count - 1]).fadeOut(300);

                self.textBtnElem[self.count].className = 'on';
                self.textBtnElem[self.count - 1].className = 'off';

            }

        },

        setTextPos: function (p) {

            var self = this;

            window.clearInterval(self.timer);

            $(self.textElem[p]).fadeIn(300);
            $(self.textElem[self.count]).fadeOut(300);
            self.textBtnElem[p].className = 'on';
            self.textBtnElem[self.count].className = 'off';

            self.count = p;
            self.timer = window.setInterval(function () { self.changeText(); }, self.delay);

        },

        setTextNext: function () {

            var self = this;

            window.clearInterval(self.timer);
            self.changeText();
            self.timer = window.setInterval(function () { self.changeText(); }, self.delay);

        },

        setTextBack: function () {

            var self = this;

            window.clearInterval(self.timer);
            if (self.count == 0) {

                $(self.textElem[self.QTD - 1]).fadeIn(300);
                $(self.textElem[self.count]).fadeOut(300);

                self.textBtnElem[self.QTD - 1].className = 'on';
                self.textBtnElem[self.count].className = 'off';
                self.count = self.QTD - 1;

            } else {

                $(self.textElem[self.count - 1]).fadeIn(300);
                $(self.textElem[self.count]).fadeOut(300);

                self.textBtnElem[self.count - 1].className = 'on';
                self.textBtnElem[self.count].className = 'off';
                self.count -= 1;

            }

            self.timer = window.setInterval(function () { self.changeText(); }, self.delay);

        }

    }

    window.Corpora = Corpora;

})();



Corpora.initTextGallery({
    btn_area: "testimonials_btn",
    text_area: "testimonials",
    text_tag: "h2",
    btn_tag: "article",
    delay: 3000
});

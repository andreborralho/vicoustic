jQuery('#world-map').vectorMap({
    series: {
        regions: [{
            values: {
                PT:'#f89f28',
                US:'#f89f28',
                AL:'#f89f28',
                DZ:'#f89f28',
                AO:'#f89f28',
                AU:'#f89f28',
                AT:'#f89f28',
                AZ:'#f89f28',
                BY:'#f89f28',
                BE:'#f89f28',
                BA:'#f89f28',
                CA:'#f89f28',
                BG:'#f89f28',
                CZ:'#f89f28',
                HR:'#f89f28',
                CL:'#f89f28',
                CY:'#f89f28',
                CN:'#f89f28',
                DK:'#f89f28',
                EG:'#f89f28',
                EE:'#f89f28',
                FI:'#f89f28',
                FR:'#f89f28',
                GE:'#f89f28',
                DE:'#f89f28',
                GR:'#f89f28',
                HU:'#f89f28',
                IN:'#f89f28',
                ID:'#f89f28',
                IL:'#f89f28',
                IT:'#f89f28',
                JP:'#f89f28',
                KZ:'#f89f28',
                _1:'#f89f28',
                KW:'#f89f28',
                LB:'#f89f28',
                LT:'#f89f28',
                LU:'#f89f28',
                MK:'#f89f28',
                MY:'#f89f28',
                MA:'#f89f28',
                ME:'#f89f28',
                MM:'#f89f28',
                NL:'#f89f28',
                NO:'#f89f28',
                OM:'#f89f28',
                PH:'#f89f28',
                PL:'#f89f28',
                RU:'#f89f28',
                SA:'#f89f28',
                RS:'#f89f28',
                SK:'#f89f28',
                SI:'#f89f28',
                ZA:'#f89f28',
                KR:'#f89f28',
                ES:'#f89f28',
                LK:'#f89f28',
                SE:'#f89f28',
                CH:'#f89f28',
                TH:'#f89f28',
                TR:'#f89f28',
                GB:'#f89f28',
                UA:'#f89f28',
                VN:'#f89f28',
                AE:'#f89f28'
            }
        }]
    },
    onLabelShow: function(event, label, code){
        label.text(label.text() + " ("  + ")");
    }
});
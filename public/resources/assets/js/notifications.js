var notifications = {
    show: function(options){
        var defaults = {
            style: "default", 
            title: "", 
            message: ""
        };

        options = $.extend(true, {}, defaults, options);

        $.growl(options);
    },
    loading: {
        show:   function(options){
            var defaults = {
                style: "warning", 
                title: "يرجى الانتظار", 
                message: 'جاري معالجة البيانات...', 
                duration: 9999*9999 
            };
    
            options = $.extend(true, {}, defaults, options);
            
            notifications.show(options);
        }
    },
    success: {
        show: function(options){
            var defaults = {
                style: "notice", 
                title: "تمت العملية", 
                message: 'تم معالجة البيانات بنجاح'
            };
    
            options = $.extend(true, {}, defaults, options);
            
            notifications.show(options);
        }
    },
    danger: {
        show: function(options){
            var defaults = {
                style: "error", 
                title: "فشلت العملية!", 
                message: 'يرجى المحاولة فيما بعد أو التواصل مع الدعم الفني.', 
                duration: 9999*9999 
            };
    
            options = $.extend(true, {}, defaults, options);
            
            notifications.show(options);
        }
    }
}
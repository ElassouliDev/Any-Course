// $(document).on('click', '[data-editable]', function(){
//     var $this = $(this);

//     return;
//     if(!$this.is('[data-editable-mode]')){
//         $this.attr('data-editable-mode', true);
//         $this.attr('data-editable-original-value', $this.html());

//         if($this.data('type') == "text"){
//             $this.html('<input type="text" value="' + $this.html() + '"/><i class="fa fa-close" data-editable-action="cancel" title="إلغاء العملية"></i>');
//         }

//         if($this.data('type') == "select"){
//             var has_empty = false;
//             var select2 = false;
//             var multiple = false;

//             if($this.attr('data-has_empty') == "true"){
//                 has_empty = true;
//             }

//             // if($this.hasClass('select2')){
//             //     select2 = true;
//             // }

//             // if($this.is('[multiple]')){
//             //     multiple = true;
//             // }
            
//             $this.html('<select style="width:100%;" data-value="' + $this.attr('data-value') + '" data-options_source="' + $this.attr('data-options_source') + '" data-options_source_id="' + $this.attr('data-options_source_id') + '"' + (has_empty ? ' data-has_empty="true"' : '') + (multiple ? ' multiple' : '') + '></select>');

//             GLOBALS.initSelects();
            
//             // if(select2){
//             //     $this.find('select').select2();
//             // }
//         }
//     }
// });

// $(document).on('keyup', '[data-editable][data-type="text"]', function(event){
//     var $this = $(this);

//     if(event.keyCode == 13) {
//         editable.confirmation($this, $this.find('input').val());
//     }

//     if(event.keyCode == 27) {
//         $this.removeAttr("data-editable-mode");
//         $this.html($this.attr('data-editable-original-value'));
//     }
// });

// $(document).on('change', '[data-editable][data-type="select"]', function(event){
//     var $this = $(this);

//     if(!$this.is('[multiple]')){
//         editable.confirmation($this, $this.find('select option:selected').val());
//     }
// });

// // $(document).on('keyup', '[data-editable][data-type="select"][multiple]', function(event){
// //     var $this = $(this);

// //     if(event.keyCode == 13) {
// //         console.log($this.closest('select2').select2('val'));
// //         // editable.confirmation($this, $this.find('select option:selected').val());
// //     }

// //     if(event.keyCode == 27) {
// //         $this.removeAttr("data-editable-mode");
// //         $this.html($this.attr('data-editable-original-value'));
// //     }
// // });

// var editable = {
//     confirmation: function($element, value){
//         swal({
//             title: "هل أنت متأكد من أنك تريد تحديث البيانات؟",
//             icon: "warning",
//             dangerMode: true,
//             buttons: ["إلغاء العملية", "تحديث البيانات"]
//         })
//         .then((process) => {
//             if(process) {
//                 editable.process($element, value);
//                 return;
//             }

//             if($element.data('type') == "select"){
//                 $element.html($element.data('editable-original-value'));
//             }
//         });
//     },
//     process: function($element, value){
//         var posted_data = {
//             _token: $("meta[name='csrf-token']").attr("content"),
//             id: $element.attr('data-id'),
//             column: $element.attr('data-column'),
//             value: value
//         };
    
//         notifications.loading.show();
    
//         $.post($element.attr('data-url'), posted_data,
//         function(response, status){
//             $element.removeAttr("data-editable-mode");

//             if($element.attr('data-type') == "text"){
//                 $element.html($element.find('input').val());
//             }

//             if($element.attr('data-type') == "select"){
//                 $element.html($element.find('select option:selected').text());
//                 $element.attr('data-value', value);
//             }

//             http.success(response);
//         })
//         .fail(function(response) {
//             http.fail(response.responseJSON);
//         });
//     }
// }
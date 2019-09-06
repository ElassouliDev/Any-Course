$(document).ready(function(){
    $("#addVid").on("click",function(){
        let i = $("#step-3 .col-md-12").children().length - 3;
        console.log(i);
        
        $(`
        <div class="form-group">
            <label class="control-label" for="vid${i}">Video ${i}</label>
            <input maxlength="200" type="file" required="required" accept="video/*" class="form-control" id="vid${i}" />
        </div>
        `).insertBefore(this);
        
    });
});
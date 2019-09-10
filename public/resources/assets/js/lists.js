/*
var GLOBALS = {
    options: {
    }
};

$(function() {
    $('[data-options_source="active"]').livequery(function(){
        $('[data-options_source="active"]').briskSelectOptions({
            options: [
                {id: 0, name: "مجمد"},
                {id: 1, name: "فعال"}
            ]
        });
    });

    $('[data-options_source="zones"]').livequery(function(){
        $('[data-options_source="zones"]').briskSelectOptions({
            options: [
                {id: "غزة", name: "غزة"},
                {id: "رفح", name: "رفح"},
                {id: "خانيونس", name: "خانيونس"},
                {id: "دير البلح", name: "دير البلح"},
                {id: "الجنوب", name: "الجنوب"},
                {id: "الشمال", name: "الشمال"}
            ]
        });
    });
        
    $('[data-options_source="course_categories"]').livequery(function(){
        $('[data-options_source="course_categories"]').briskSelectOptions({
            resource: BASE_URL + "/courses/categories/list" 
        });
    });
        
    $('[data-options_source="category_types_stocks"]').livequery(function(){
        $('[data-options_source="category_types_stocks"]').briskSelectOptions({
            resource: BASE_URL + "/products/categories/types/stocks/list" 
        });
    });
        
    $('[data-options_source="product_colors"]').livequery(function(){
        $('[data-options_source="product_colors"]').briskSelectOptions({
            resource: BASE_URL + "/products/colors/list" 
        });
    });
        
    $('[data-options_source="product_sizes"]').livequery(function(){
        $('[data-options_source="product_sizes"]').briskSelectOptions({
            resource: BASE_URL + "/products/sizes/list" 
        });
    });
        
    $('[data-options_source="currencies"]').livequery(function(){
        $('[data-options_source="currencies"]').briskSelectOptions({
            resource: BASE_URL + "/Currencies/list" 
        });
    });
        
    $('[data-options_source="invoice_types"]').livequery(function(){
        $('[data-options_source="invoice_types"]').briskSelectOptions({
            resource: BASE_URL + "/PointOfSale/invoices/types/list" 
        });
    });
        
    $('[data-options_source="branches"]').livequery(function(){
        $('[data-options_source="branches"]').briskSelectOptions({
            resource: BASE_URL + "/companies/branches/list" 
        });
    });
        
    $('[data-options_source="posm_products_categories"]').livequery(function(){
        $('[data-options_source="posm_products_categories"]').briskSelectOptions({
            resource: BASE_URL + "/PointOfSale/management/" + $(this).attr('data-options_source_id') + "/categories/list"
        });
    });
        
    $('[data-options_source="pm_product_groups"]').livequery(function(){
        $('[data-options_source="pm_product_groups"]').briskSelectOptions({
            resource: BASE_URL + "/Products/groups/list",
            formatters: {
                option: {
                    value: "id",
                    title: "list_name"
                }
            }
        });
    });
        
    $('[data-options_source="posm_products"]').livequery(function(){
        $('[data-options_source="posm_products"]').briskSelectOptions({
            resource: BASE_URL + "/PointOfSale/products/list" 
        });
    });
        
    $('[data-options_source="posm_points_of_sales"]').livequery(function(){
        $('[data-options_source="posm_points_of_sales"]').briskSelectOptions({
            resource: BASE_URL + "/PointOfSale/list" 
        });
    });
        
    $('[data-options_source="employees"]').livequery(function(){
        $('[data-options_source="employees"]').briskSelectOptions({
            resource: BASE_URL + "/Users/employees/list"
        });
    });
        
    $('[data-options_source="banks"]').livequery(function(){
        $('[data-options_source="banks"]').briskSelectOptions({
            resource: BASE_URL + "/Banks/list" 
        });
    });
        
    $('[data-options_source="clients"]').livequery(function(){
        $('[data-options_source="clients"]').briskSelectOptions({
            resource: BASE_URL + "/Users/clients/list"
        });
    });
        
    $('[data-options_source="roles"]').livequery(function(){
        $('[data-options_source="roles"]').briskSelectOptions({
            resource: BASE_URL + "/Users/roles/list",
            formatters: {
                option: {
                    value: "name",
                    title: "name_ar"
                }
            } 
        });
    });
        
    $('[data-options_source="salespersons"]').livequery(function(){
        $('[data-options_source="salespersons"]').briskSelectOptions({
            resource: BASE_URL + "/Users/salespersons/list" 
        });
    });
        
    $('[data-options_source="marketers"]').livequery(function(){
        $('[data-options_source="marketers"]').briskSelectOptions({
            resource: BASE_URL + "/Users/marketers/list" 
        });
    });
    
    $('[data-options_source="distributors"]').livequery(function(){
        $('[data-options_source="distributors"]').briskSelectOptions({
            resource: BASE_URL + "/Users/distribution-users/list" 
        });
    });
        
    $('[data-options_source="mrm_maintenance_request_status_types"]').livequery(function(){
        $('[data-options_source="mrm_maintenance_request_status_types"]').briskSelectOptions({
            resource: BASE_URL + "/MaintenanceRequests/types/list" 
        });
    });
        
    $('[data-options_source="tm_task_status_types"]').livequery(function(){
        $('[data-options_source="tm_task_status_types"]').briskSelectOptions({
            resource: BASE_URL + "/Tasks/types/list" 
        });
    });

    $('[data-options_source="col"]').livequery(function(){
        $('[data-options_source="col"]').briskSelectOptions({
            options: [
                {id: "", name: ""},
                {id: "رقم الحساب", name: "رقم الحساب", name_en:"account_number"},
                {id: "اسم الحساب", name: "اسم الحساب", name_en:"account_name"},
                {id: "الرصيد", name: "الرصيد", name_en:"balance"},
                {id: "الرصيد التقديري", name: "الرصيد التقديري", name_en:"estimated_balance"},
                {id: "مجموع الشيكات", name: "مجموع الشيكات", name_en:"total_checks"},
                {id: "المدة- محاسب", name: "المدة- محاسب", name_en:"duration_accounting"},
                {id: "المدة- مخازن", name: "المدة- مخازن", name_en:"duration_inventory"},
                {id: "مجموع", name: "مجموع", name_en:"total"},
                {id: "رقم السند", name: "رقم السند", name_en:"bond_number"},
                {id: "المبلغ- نقداً", name: "المبلغ- نقداً", name_en:"cash"},
                {id: "المبلغ- شيكاً", name: "المبلغ- شيكاً", name_en:"check"},
                {id: "نهاية", name: "نهاية", name_en:"end_at"},
                {id: "ملاحظات", name: "ملاحظات", name_en:"note"}
            ]
        });
    });
        
    $('[data-options_source="em_expenses_types"]').livequery(function(){
        $('[data-options_source="em_expenses_types"]').briskSelectOptions({
            resource: BASE_URL + "/Expenses/types/list" 
        });
    });
});*/

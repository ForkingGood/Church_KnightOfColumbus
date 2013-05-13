
        <link href="/Church_KnightOfColumbus/asset/kendoUI/styles/kendo.common.css" rel="stylesheet">
        <link href="/Church_KnightOfColumbus/asset/kendoUI/styles/kendo.black.css"rel="stylesheet"> 
        <script src="/Church_KnightOfColumbus/asset/kendoUI/js/kendo.web.js"></script>

        <div id="grid"></div>
        <script>
            $(function() {

                var crudServiceBaseUrl = "http://demos.kendoui.com/service",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/Products",
                                    dataType: "jsonp"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/Products/Update",
                                    dataType: "jsonp"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/Products/Destroy",
                                    dataType: "jsonp"
                                },
                                create: {
                                    url: crudServiceBaseUrl + "/Products/Create",
                                    dataType: "jsonp"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 20,
                            schema: {
                                model: {
                                    id: "ProductID",
                                    fields: {
                                        ProductID: { editable: false, nullable: true },
                                        ProductName: { validation: { required: true } },
                                        UnitPrice: { type: "number", validation: { required: true, min: 1} },
                                        Discontinued: { type: "boolean" },
                                        UnitsInStock: { type: "number", validation: { min: 0, required: true } }
                                    }
                                }
                            }
                        });


                
                $("#grid").kendoGrid({
                	dataSource: {
	                    transport: {
	                        read: "http://localhost:1234/Church_KnightOfColumbus/Membership/memberList/-1/-1"
	                    },
	                    schema: {
	                        data: "data"
	                    }
	                },
                    navigatable: true,
                    filterable: true,
                    sortable: true,
                    pageable: true,
                    toolbar: ["create", "save", "cancel"],
                    editable: true,
	                columns: [
                        { field: "first_name", title: "First Name" }, 
                        { field: "last_name", title: "Last Name" },
                        { field: "rank", title: "Rank"},
                        { field: "date_joined", title: "Since"},
                        { field: "description"},
                        { field: "date_of_birth", title: "Birthday"},
                        { command: "destroy", title: " ", width: 100}
                    ]
                });
            });
        </script> 
<br />
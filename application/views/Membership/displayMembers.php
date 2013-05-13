
        <link href="/Church_KnightOfColumbus/asset/kendoUI/styles/kendo.common.css" rel="stylesheet">
        <link href="/Church_KnightOfColumbus/asset/kendoUI/styles/kendo.blueopal.css"rel="stylesheet"> 
        <script src="/Church_KnightOfColumbus/asset/kendoUI/js/kendo.web.js"></script>

        <div id="grid"></div>
        <script>
            $(function() {
                $("#grid").kendoGrid({
                	dataSource: {
	                    transport: {
	                        read: "http://localhost:1234/Church_KnightOfColumbus/Membership/memberList/-1/-1"
	                    },
	                    schema: {
	                        data: "data"
	                    }
	                },
                    filterable: true,
                    sortable: true,
                    pageable: true,
	                columns: [
                        { field: "first_name", title: "First Name" }, 
                        { field: "last_name", title: "Last Name" },
                        { field: "rank", title: "Rank"},
                        { field: "date_joined", title: "Since"},
                        { field: "description"},
                        { field: "date_of_birth", title: "Birthday"}
                    ]
                });
            });
        </script> 
<br />
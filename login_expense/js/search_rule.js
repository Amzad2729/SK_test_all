        // search date rule
        function get_day() {
            let from_date = document.getElementById("from_date").value;
            let to_date = document.getElementById("to_date").setAttribute("min", from_date);
        }
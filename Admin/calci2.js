var executed = false;
// A function that stores and displays the values under marks attribute in a list
function updateDatabase(list) {
    $.ajax({
      url: "calci.php", // The PHP file that updates the database
      type: "POST", // The HTTP method to use
      data: {list: list}, // The data to send to the server
      success: function(response) {
        // The function to execute when the request is successful
        alert("Database updated successfully");
      },
      error: function(xhr, status, error) {
        // The function to execute when the request fails
        alert("Error: " + error);
      }
    });
  }
function newGrade() {
    var dup=[];
    if (executed) {
        return;
    }
    // Get all the table rows except the first one (which contains the headers)
    var rows = document.querySelectorAll("#data-table tr:not(:first-child)");
    // Initialize an array to store the list
    var list = [];
    // Loop through the rows
    for (var i = 0; i < rows.length; i++) {
      // Get the third cell of each row (which contains the marks value)
      var cell = rows[i].cells[3];
      // Get the marks value as a number
      var marks = Number(cell.textContent);
      // Push the marks value to the list
      list.push(marks);
    }
    // Display the list in an alert box (you can also use a HTML element instead)
    console.log("The list of the marks is " + list.join(", "));

    // define a function to assign grades based on marks
    function grade(grade) {
        if (grade >= 90) {
        return "O";
        } else if (grade >= 80) {
        return "A+";
        } else if (grade >= 70) {
        return "A";
        } else if (grade >= 60) {
        return "B+";
        } else if (grade >= 50) {
        return "B";
        } else if (grade >= 40) {
        return "C";
        } else if (grade >= 30) {
        return "P";
        } else {
        return "F";
        }
    }
    
    // define a function to calculate the new grades after adding grace marks
    function claculate(l, num) {
        // create a list of the differences between the marks and the next multiple of 10
        let min_list = l.map((i) => Math.ceil(i / 10) * 10 - i);
        console.log("The list of the marks is " + min_list.join(", "));
        // loop through the list of marks
        for (let i = 0; i < l.length; i++) {
        // find the minimum difference
        let k = Math.min(...min_list);
        // check if there are enough grace marks to add
        if (num >= k) {
            // find the index of the minimum difference
            let index_ = min_list.indexOf(k);
            // add the difference to the mark at that index
            l[index_] += k;
            // update the difference to the new mark
            min_list[index_] = l[index_];
            // subtract the difference from the grace marks
            num -= k;
        } else {
            // break the loop if there are not enough grace marks
            break;
        }
        }
        // return a list of grades based on the new marks
        console.log("The list of the marks is " + l.join(", "));
        return l.map((i) => grade(i));
    }
    
    // create a variable for the grace marks
    let num = 10;
    // create a copy of the list of marks
    let l_copy = [...list];
    // call the calculate function with the copy and the grace marks
    let newgradelist = claculate(l_copy, num);
    // print the new grade list
    console.log(newgradelist);
    dup=newgradelist;
    // assume you have a list of values for the final grade column

    // get the table element by its id
    let table = document.getElementById("data-table");
    let header_cell = table.rows[0].insertCell();
    // set the cell to be a table header element
    header_cell.outerHTML = "<th>Final Grade</th>";
    // loop through the rows of the table
    for (let i = 1; i < table.rows.length; i++) {
    // create a new cell for each row
    let cell = table.rows[i].insertCell();
    // set the attribute name of the cell to final grade
    // set the text content of the cell to the corresponding value from the list
    cell.textContent = newgradelist[i-1];
    }
    executed = true;
    console.log("ece dup")
    console.log(dup)
    updateDatabase(dup);
  }
  // Define a function to update the database using Ajax
  
 

// Dynamic Field Creation with Javascript

//   Add Section 2
function addInputFields() {
    var container = document.getElementById("inputFieldsContainer");

    // Create the main div container
    var rowDiv = document.createElement("div");
    rowDiv.classList.add("row", "mb-2");

    // Create the first column div for Action Plan
    var col1Div = document.createElement("div");
    col1Div.classList.add("col", "mb-2");

    // Create the label for Action Plan
    var label1 = document.createElement("label");
    label1.classList.add("col-sm-10", "col-form-label");
    label1.textContent = "Action Plan";
    col1Div.appendChild(label1);

    var textareaDiv = document.createElement("div");
    textareaDiv.classList.add("col-sm-15");
    // Create the textarea for Action Plan
    var textarea = document.createElement("textarea");
    textarea.classList.add("form-control");
    textarea.cols = "40";
    textarea.rows = "5";
    textarea.name = "action_plan";
    col1Div.appendChild(textarea);

    col1Div.appendChild(textareaDiv);
    // Create the second column div for Treatment and Date of Assessment
    var col2Div = document.createElement("div");
    col2Div.classList.add("col", "mb-1");

    // Create the inner row div for Treatment
    var innerRow1Div = document.createElement("div");
    innerRow1Div.classList.add("row", "mb-4");

    var treatmentDiv = document.createElement("div");
    treatmentDiv.classList.add("col-sm-15");
    // Create the label for Treatment
    var label2 = document.createElement("label");
    label2.classList.add("col-sm-10", "col-form-label");
    label2.textContent = "Treatment";
    innerRow1Div.appendChild(label2);

    // Create the select dropdown for Treatment
    var select = document.createElement("select");
    select.required = true;
    select.name = "treatment";
    select.classList.add("form-select");
    select.setAttribute("aria-label", "Default select example");
    innerRow1Div.appendChild(select);

    // Create the options for Treatment
    var option1 = document.createElement("option");
    option1.value = "";
    option1.textContent = "Select";
    select.appendChild(option1);

    var option2 = document.createElement("option");
    option2.value = "Tolerate";
    option2.textContent = "Tolerate";
    select.appendChild(option2);

    var option3 = document.createElement("option");
    option3.value = "Treat";
    option3.textContent = "Treat";
    select.appendChild(option3);

    var option4 = document.createElement("option");
    option4.value = "Transfer";
    option4.textContent = "Transfer";
    select.appendChild(option4);

    var option4 = document.createElement("option");
    option4.value = "Terminate";
    option4.textContent = "Terminate";
    select.appendChild(option4);

    treatmentDiv.appendChild(select);
    innerRow1Div.appendChild(treatmentDiv);

    // Create the inner row div for Date of Assessment
    var innerRow2Div = document.createElement("div");
    innerRow2Div.classList.add("row", "mb-2");

    // Create the label for Date of Assessment
    var label3 = document.createElement("label");
    label3.classList.add("col-sm-10", "col-form-label");
    label3.textContent = "Date of Assessment";
    innerRow2Div.appendChild(label3);

    // Create the div container for input and buttons
    var col3Div = document.createElement("div");
    col3Div.classList.add("col-sm-7");

    // Create the input field for Date of Assessment
    var input = document.createElement("input");
    input.required = true;
    input.type = "date";
    input.classList.add("form-control");
    input.placeholder = "";
    input.name = "dateAs";
    col3Div.appendChild(input);

    // Create the buttons for adding and removing fields
    var buttonsDiv = document.createElement("div");
    buttonsDiv.classList.add("col-sm-5");

    var addButton = document.createElement("button");
    addButton.type = "button";
    addButton.classList.add("btn", "btn-success");
    addButton.textContent = "Add";
    addButton.onclick = addInputFields;
    buttonsDiv.appendChild(addButton);

    var removeButton = document.createElement("button");
    removeButton.type = "button";
    removeButton.classList.add("btn", "btn-danger");
    removeButton.textContent = "Remove";
    removeButton.onclick = removeInputFields;
    buttonsDiv.appendChild(removeButton);

    // Append the elements to their respective containers
    innerRow2Div.appendChild(col3Div);
    innerRow2Div.appendChild(buttonsDiv);
    col2Div.appendChild(innerRow1Div);
    col2Div.appendChild(innerRow2Div);
    rowDiv.appendChild(col1Div);
    rowDiv.appendChild(col2Div);
    container.appendChild(rowDiv);
  }

  function removeInputFields() {
    var container = document.getElementById("inputFieldsContainer");
    var rows = container.getElementsByClassName("row");
    // Remove the last row if there are more than one
    if (rows.length > 1) {
      container.removeChild(rows[rows.length - 1]);
    }
  }
 
@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
@endsection
@section('content')


<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>Question Additions</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="home-item" href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Question Additions</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid starts-->
<div class="container-fluid default-dash">
    <div class="d-flex flex-column gap-2">
        <div class="card">
            <div class="card-body">
                <form id="questionForm" class="needs-validation" novalidate>
                    <div class="row">

                        <!-- Sector -->
                        <div class="col-md-6 col-12 mb-3">
                            <label for="sector" class="form-label">Category </label>
                            <select class="form-select" id="sector">
                                <option value="" disabled selected>Select category</option>
                                <option value="Chairs">Chairs</option>
                                <option value="Desks">Desks</option>
                                <option value="Tables">Tables</option>
                            </select>
                            <div class="invalid-feedback">Please select a category.</div>
                        </div>

                        <!-- Sub-Category -->
                        <div class="col-md-6 col-12 mb-3">
                            <label for="actionItems" class="form-label">Sub-Category</label>
                            <select class="form-select" id="actionItems">
                                <option value="" disabled selected>Select sub category</option>
                                <option value="Wooden Chairs">Wooden Chairs</option>
                                <option value="Steel Chairs">Steel Chairs</option>
                                <option value="Plastic Chairs">Plastic Chairs</option>
                            </select>
                            <div class="invalid-feedback">Please select a sub category.</div>
                        </div>

                        <!-- Question Type -->
                        <div class="col-md-6 col-12 mb-3">
                            <label for="questionType" class="form-label">Question Type </label>
                            <select class="form-select" id="questionType">
                                <option value="" disabled selected>Select question type</option>
                                <option value="text field">Text Field</option>
                                <option value="drop down">Drop Down</option>
                                <!-- <option value="multi selected">Multi Selected</option> -->
                                <!-- <option value="file upload">File Upload</option> -->
                            </select>
                            <div class="invalid-feedback">Please select a question type.</div>
                        </div>
                    </div>

                    <!-- Dynamic Fields -->
                    <div class="row" id="questionFields"></div>

                    <!-- Questions Table -->
                    <div id="questionsTableWrapper" class="mt-4" style="display:none;">
                        <h5>Added Questions</h5>
                        <table class="table table-bordered" id="questionsTable">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Question</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <!-- Submit -->
                    <div class="d-flex justify-content-center mt-4">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
@section('script')
<script>
document.getElementById('questionType').addEventListener('change', function() {
    const type = this.value;
    const container = document.getElementById('questionFields');
    container.innerHTML = '';

    if (!type) return;

    let fields = `
        <div class="col-md-6 col-12 mb-3">
            <label class="form-label">Enter Question </label>
            <input type="text" class="form-control" placeholder="enter question" id="questionInput" required>
        </div>
    `;

    if (type === 'drop down' || type === 'multi selected') {
        fields += `
            <div class="col-md-6 col-12 mb-3">
                <label class="form-label">Enter Options </label>
                <div id="optionsContainer">
                    <div class="d-flex mb-2">
                        <input type="text" class="form-control" name="options[]" placeholder="Option" required>
                        <button type="button" class="btn btn-success ms-2 addOption">+</button>
                    </div>
                </div>
            </div>
        `;
    }

    fields += `
        <div class="col-md-6 col-12 d-flex align-items-end mb-3">
            <button type="button" class="btn btn-primary" id="addQuestionBtn">Add Question</button>
        </div>
    `;

    container.innerHTML = fields;
});

// Add / Remove Option
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('addOption')) {
        const optionsContainer = document.getElementById('optionsContainer');
        const optionDiv = document.createElement('div');
        optionDiv.classList.add('d-flex', 'mb-2');
        optionDiv.innerHTML = `
            <input type="text" class="form-control" name="options[]" placeholder="Option" required>
            <button type="button" class="btn btn-danger ms-2 removeOption">-</button>
        `;
        optionsContainer.appendChild(optionDiv);
    }
    if (e.target.classList.contains('removeOption')) {
        e.target.parentElement.remove();
    }
});

// Add Question to Table
document.addEventListener('click', function(e) {
    if (e.target.id === 'addQuestionBtn') {
        const type = document.getElementById('questionType').value;
        const question = document.getElementById('questionInput').value;
        let options = '';

        if (type === 'drop down' || type === 'multi selected') {
            const optionInputs = document.querySelectorAll('#optionsContainer input');
            options = Array.from(optionInputs).map(o => o.value.trim()).filter(v => v).join(', ');
        }

        if (!question.trim()) {
            alert("Please enter a question.");
            return;
        }

        const tableBody = document.querySelector('#questionsTable tbody');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${type}</td>
            <td>${question}</td>
            <td>${options}</td>
        `;
        tableBody.appendChild(row);

        // Show table
        document.getElementById('questionsTableWrapper').style.display = 'block';

        // Reset dynamic fields
        document.getElementById('questionFields').innerHTML = '';
        document.getElementById('questionType').value = '';
    }
});
</script>
@endsection
@extends('pwa.layout.app')
@section('title') Dashboard @endsection
@section('style')
<style>
.font-aneka {
    font-family: 'Anek Latin', sans-serif !important;
}

.fontsize {
    font-size: 18px;
    font-weight: 600;
    color: black;
}

.fontsize1 {
    font-size: 16px;
    font-weight: 500;
    color: rgba(0, 0, 0, 0.521);
}

.footer .footer-title {
    font-size: 23px;
}

.theme-light input,
select,
textarea {
    border-color: rgb(0 0 0 / 40%) !important;
    border-radius: 5px;
}

.form-select {
    border-color: rgb(0 0 0 / 40%) !important;
    border-radius: 5px;
    font-size: 12px;
}

.fontsize {
    color: black;
    font-size: 14px;
}

.btn:hover {
    background-color: #4d8ad9;
    border-color: #fff;
}

.btn {
    background-color: #4d8ad9;
    border-color: #fff;
}

.table-wrapper {
    overflow-x: auto;
    overflow-y: hidden;
    white-space: nowrap;
}

.table-wrapper::-webkit-scrollbar {
    height: 3px;
}

.table-wrapper::-webkit-scrollbar-track {
    background: #f1f1f1 !important;
}

.table-wrapper::-webkit-scrollbar-thumb {
    background: #6c63ff !important;
    border-radius: 10px !important;
}

.table-wrapper::-webkit-scrollbar-thumb:hover {
    background: #4b47cc !important;
}
.font-inventory{
    font-size: 18px !important;
    font-weight: 700 !important;
    align-items:center !important;
}

.add-more-btn {
  border-radius: 6px;
  padding: 8px 16px;
  font-weight: 500;
  background-color: #007bff;
  color: white;
  font-size:14px;
  border: none;
}
.add-more-btn:hover {
  background-color: #0056b3;
}
.mb2{
    margin-bottom:10px !important;
}


</style>
@endsection
@section('content')
<div class="page-title page-title-small">
    <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Asset Form</h2>
    <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img">
        <img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"
             style="width:40px;height:40px;border-radius:50%;">
    </a>
</div>
<div class="card header-card shape-rounded" data-card-height="90">
    <div class="card-overlay bg-highlight opacity-95"></div>
    <div class="card-overlay dark-mode-tint"></div>
    <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
</div>

<div class="d-flex flex-column gap-2 mt-5 mb-3">
    <div class="card m-2" style="border-radius: 20px;">
        <div class="card-body">
              <div class="d-flex flex-column align-items-center justify-content-center">
                <span class="mb-2 text-center font-aneka text-dark font-inventory">Asset Inventory Form</span>
            </div>

            <form id="assetForm" class="needs-validation" novalidate>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="district" class="form-label mb-0 font-aneka fontsize">District</label>
                        <select class="form-select" id="districtSelect" required onchange="document.getElementById('district_id').value = this.value">
                          @if($user_district)
                          <option selected value="{{$user_district?->id}}">{{$user_district?->name}}</option>
                          @else <option value="">-- Select District --</option>
                          @endif
                        </select>
                    </div>
                    <!-- Category -->
                    <div class="col-md-6">
                        <label class="form-label mb-0 font-aneka fontsize">Category</label>
                        <div class="input-group">
                            <select class="form-select" id="categorySelect" required>
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Sub Category -->
                    <div class="col-md-6">
                        <label class="form-label mb-0 font-aneka fontsize">Sub Category</label>
                        <div class="input-group">
                            <select class="form-select" id="subCategorySelect" required disabled>
                                <option value="">-- Select Sub Category --</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Fields -->
                <div id="dynamicFields" class="border rounded p-2 mb-3 bg-white" style="display:none;">
                    <h5 id="formTitle" class="mb-3 font-inventory"></h5>
                    <div id="questionsContainer" class="row g-3 mb-0 align-items-end"></div>
                    <div class="text-center">
                        <button class="btn btn-success font-aneka mt-3" id="addBtn" type="button">Add</button>
                    </div>
                </div>
            </form>

            <!-- Table -->
            <form id="assetCollection" action="{{ route('asset-inventory.store') }}" method="post">
            <div class="card" id="assetsTableCard" style="display:none;">
                @csrf
                <input type="hidden" name="district_id" id="district_id" value="{{$user_district?->id}}">
                <div class="card-header text-center font-aneka" style="font-size: 15px;color: black;">
                    <b>Added Assets Table</b>
                </div>
                <div class="card-body p-0" style="overflow: scroll;">
                    <div class="table-wrapper">
                        <table class="table table-bordered" id="assetsTable">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Final Submit -->
            <div class="text-center mt-4">
                <button class="btn btn-primary font-aneka" id="finalSubmit" style="display:none;">Final Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="modalDynamicFields" class="border rounded p-2 mb-3 bg-white" style="display:none;">
                    <h5 id="modalFormTitle" class="mb-3 font-inventory"></h5>
                    <div id="modalQuestionsContainer" class="row g-3 mb-0 align-items-end"></div>
                    <div class="text-center">
                        <button class="btn btn-success font-aneka mt-3" id="modalUpdateBtn" type="button">Update</button>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  @if(session()->has('success'))
  Swal.fire("Submitted!", "Asset Form submitted successfully", "success");
  {{session()->forget('success')}}
  @endif

  var lat;
  var long;

  $(document).ready(function() {
      var x = document.getElementById("demo");
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
      } else {
          x.innerHTML = "Geolocation is not supported by this browser.";
      }

  });

  function showPosition(position) {
      lat = position.coords.latitude;
      long = position.coords.longitude;
  }

  function permission_for(type) {
      return new Promise((resolve) => {
          navigator.permissions.query({
              name: type
          }).then(res => {
              if (res.state == 'denied')
                  resolve(1);
              resolve(0);
          });
      });
  }

  async function check_permissions() {
      var msg = 'Please allow permissions for ';
      var is_location = await permission_for('geolocation');

      navigator.permissions.query({
          name: "geolocation"
      }).then(res => {
          if (res.state != 'granted') is_location = 1;
      });
      if (is_location) msg += 'Location';
      else msg = '';
      if (msg.length) {
          Swal.fire({
              text: msg,
              icon: "",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              confirmButtonText: "Close"
          });
      }
  }
  check_permissions();

  if (window.performance && window.performance.navigation.type === 2) {
    window.location.reload();
  }
  // Populate Subcategories
  document.getElementById("categorySelect").addEventListener("change", function() {
      const category = this.value;
      const subSelect = document.getElementById("subCategorySelect");
      subSelect.innerHTML = '<option value="">-- Select Sub Category --</option>';
      if (category && subCategories[category]) {
          subCategories[category].forEach(sc => {
              let opt = document.createElement("option");
              opt.value = sc;
              opt.textContent = sc;
              subSelect.appendChild(opt);
          });
          subSelect.disabled = false;
      } else {
          subSelect.disabled = true;
      }
      document.getElementById("dynamicFields").style.display = "none";
  });

  document.getElementById("subCategorySelect").addEventListener("change", function () {
    const latitude = lat;
    const longitude = long;
    const subCat = this.value;
    const container = document.getElementById("questionsContainer");
    container.innerHTML = "";
    if (subCat && questions[subCat]) {
      document.getElementById("formTitle").textContent = subCat + " Details";

      questions[subCat].forEach((q) => {
        let col = document.createElement("div");
        col.className = "col-md-4";

        if (q.type === "button") {
          const btn = document.createElement("button");
          btn.type = "button";
          btn.className = q.class || "btn btn-primary add-more-btn";
          btn.textContent = q.label;
          col.appendChild(btn);

          // Click counter
          let clickCount = 0;
          const maxClicks = 2;

          btn.addEventListener("click", () => {
            clickCount++;

            // Example: duplicate the last file input
            const lastFileInput = container.querySelector('input[type="file"]:last-of-type');
            if (lastFileInput) {
              const newInput = lastFileInput.cloneNode();
              newInput.value = "";
              lastFileInput.parentNode.appendChild(newInput);
            }

            // Hide button after 3 clicks
            if (clickCount >= maxClicks) {
              btn.style.display = "none";
            }
          });
        }
        else if (q.type === "select") {
          // Render dropdown
          const selectOptions = q.options.map(opt => `<option value="${opt}">${opt}</option>`).join("");
          col.innerHTML = `
                    <label class="form-label font-aneka fontsize mb-0">${q.label} <span class="text-danger">*</span></label>
                    <select class="form-select font-aneka" data-id="${q.qid}" required>
                        <option value="">-- Select --</option>
                        ${selectOptions}
                    </select>
                    <div class="invalid-feedback mt-0">Please select ${q.label}</div>
                `;
        } else {
                    // Render normal input
                col.innerHTML = `
            <label class="form-label font-aneka fontsize mb-0">
              ${q.label} ${(q.type !== "year" && q.required !== false) ? '<span class="text-danger">*</span>' : ''}
            </label>

            <input 
              type="${q.type === "year" ? "text" : q.type}" 
              class="form-control font-aneka" 
              data-id="${q.qid}"
              ${(q.type !== "year" && q.required !== false) ? "required" : ""}
              ${q.type === "year" ? 'maxlength="4" pattern="^[0-9]{4}$"' : ""}
              placeholder="${q.label}"
              ${q.qid === "latitude" ? `value="${latitude}"` : ""}
              ${q.qid === "longitude" ? `value="${longitude}"` : ""}
            >

            ${(q.type !== "year" && q.required !== false) ? `
              <div class="invalid-feedback mt-0">
                Please enter ${q.label}
              </div>` : ''}
          `;
        }

        container.appendChild(col);
      });

      document.getElementById("dynamicFields").style.display = "block";
    } else {
      document.getElementById("dynamicFields").style.display = "none";
    }
  });


  document.getElementById("addBtn").addEventListener("click", async function() {
    const form = document.getElementById("assetForm");
    if (!form.checkValidity()) {
        form.classList.add("was-validated");
        return;
    }

    const category_el = document.getElementById("categorySelect");
    const category = category_el.options[category_el.selectedIndex].text;
    const subCategory = document.getElementById("subCategorySelect").value;

    let details = {};
    let collection = '';
    let uuid = crypto.randomUUID();

    const inputs = document.querySelectorAll("#questionsContainer input, #questionsContainer select");

    // ⬇️ Loop through inputs
    for (const inp of inputs) {
      const label = inp.previousElementSibling?.innerText?.replace("*", "").trim() || "";
      let uuid2 = crypto.randomUUID();
      const dataId = inp.getAttribute("data-id");
      let answerValue = inp.value;

      // 🖼️ If it's an image input, upload it
      if ((dataId === "image" || dataId === "uimage") && inp.files && inp.files[0]) {
        const file = inp.files[0];
        const optimizedBlob = await compressImage(file, 0.7, 1024, 1024, 1 * 1024 * 1024);
        const formData = new FormData();
        formData.append("file", optimizedBlob, file.name);

        try {
          const response = await fetch("{{ route('upload-asset-image') }}", {
            method: "POST",
            body: formData,
            headers: {
              "X-CSRF-TOKEN": "{{csrf_token()}}"
            }
          });

          const result = await response.json();
          if (result.uuid) {
            answerValue = result.uuid;
          } else {
            Swal.fire("Error", "Failed to save image.", "error");
            return;
          }
        } catch (e) {
          console.error("Upload failed:", e);
          Swal.fire("Error", "Error saving image!", "error");
          return;
        }
      }

      // Add to details + collection
      details[label] = answerValue;
      collection += `
        <input type="hidden" name="collection[${uuid}][${uuid2}][question_id]" value="${dataId}">
        <input type="hidden" name="collection[${uuid}][${uuid2}][answer]" value="${answerValue}">
      `;
    }

    document.getElementById("assetsTableCard").style.display = "block";
    document.getElementById("finalSubmit").style.display = "inline-block";

    const tbody = document.querySelector("#assetsTable tbody");
    const row = document.createElement("tr");

    let detailStr = "";
    for (const key in details) {
        detailStr += `<b>${key}:</b> ${details[key]}<br>`;
    }

    row.innerHTML = `
      <td>${category}</td>
      <td>${subCategory}</td>
      <td>${detailStr}</td>
      <td class="d-flex gap-2"><button type="button" class="btn btn-danger btn-sm deleteBtn">Delete</button> <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-danger btn-sm editBtn">Edit</button>${collection}</td>
      
    `;

    tbody.appendChild(row);

    Swal.fire("Success", "Asset added successfully!", "success");
    let district = $('#districtSelect').val();
    form.reset();
    $('#districtSelect').val(district);
    form.classList.remove("was-validated");
    document.getElementById("subCategorySelect").disabled = true;
    document.getElementById("dynamicFields").style.display = "none";
  });


  // Delete row
  document.querySelector("#assetsTable").addEventListener("click", function(e) {
      if (e.target.classList.contains("deleteBtn")) {
        Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel'
          }).then((result) => {
              if (result.isConfirmed) {
                  e.target.closest("tr").remove();
                  if (document.querySelectorAll("#assetsTable tbody tr").length === 0) {
                      document.getElementById("assetsTableCard").style.display = "none";
                      document.getElementById("finalSubmit").style.display = "none";
                  }
                  Swal.fire('Deleted!', 'Asset has been deleted.', 'success');
              }
          });
      }
  });

  // Edit row - populate modal form
  document.querySelector("#assetsTable").addEventListener("click", function(e) {
      if (e.target.classList.contains("editBtn")) {
          const row = e.target.closest("tr");
          const cells = row.cells;
          const category = cells[0].textContent;
          const subCategory = cells[1].textContent;
          const detailsCell = cells[2];
          
          // Store the current editing row
          window.currentEditingRow = row;
          
          // Parse the details to extract form values
          const details = {};
          const detailElements = detailsCell.innerHTML.split('<br>');
          detailElements.forEach(element => {
              if (element.includes('<b>')) {
                  const match = element.match(/<b>([^:]+):<\/b> (.+)/);
                  console.log(match);
                  
                  if (match) {
                      details[match[1]] = match[2];
                  }
              }
          });
          
          // Set the category and subcategory in the main form
          const categorySelect = document.getElementById('categorySelect');
          for (let option of categorySelect.options) {
              if (option.text === category) {
                  categorySelect.value = option.value;
                  break;
              }
          }
          
          // Trigger category change to populate subcategories
          const event = new Event('change');
          categorySelect.dispatchEvent(event);
          
          // Set the subcategory after a small delay to allow subcategories to populate
          setTimeout(() => {
              const subCategorySelect = document.getElementById('subCategorySelect');
              for (let option of subCategorySelect.options) {
                  if (option.text === subCategory) {
                      subCategorySelect.value = option.value;
                      break;
                  }
              }
              
              // Trigger subcategory change to populate form fields
              const subEvent = new Event('change');
              subCategorySelect.dispatchEvent(subEvent);
              
              // After form fields are populated, fill them with existing values
              setTimeout(() => {
                  populateModalForm(details);
              }, 100);
          }, 100);
      }
  });

  // Function to populate modal form with existing data
  function populateModalForm(details) {
      const modalContainer = document.getElementById('modalQuestionsContainer');
      
      // Copy the form fields from main form to modal
      const mainContainer = document.getElementById('questionsContainer');
      modalContainer.innerHTML = mainContainer.innerHTML;
      
      // Set the modal form title
      const subCategory = document.getElementById('subCategorySelect').value;
      document.getElementById('modalFormTitle').textContent = subCategory + " Details";
      
      // Show the modal form
      document.getElementById('modalDynamicFields').style.display = "block";
      
      // Populate the form fields with existing values
      const inputs = modalContainer.querySelectorAll('input, select');
      inputs.forEach(input => {
          const label = input.previousElementSibling?.innerText?.replace("*", "").trim();
          if (details[label]) {
              input.value = details[label];
          }
      });
  }

  // Modal update button functionality
  document.getElementById('modalUpdateBtn').addEventListener('click', async function() {
      const modalContainer = document.getElementById('modalQuestionsContainer');
      const inputs = modalContainer.querySelectorAll('input, select');
      
      // Validate the modal form
      let isValid = true;
      inputs.forEach(input => {
          if (input.hasAttribute('required') && !input.value) {
              isValid = false;
              input.classList.add('is-invalid');
          } else {
              input.classList.remove('is-invalid');
          }
      });
      
      if (!isValid) {
          Swal.fire('Warning', 'Please fill all required fields!', 'warning');
          return;
      }
      
      // Update the specific editing row with new values
      if (window.currentEditingRow) {
          let detailStr = '';
          let collection = '';
          let uuid = crypto.randomUUID();
          for (const inp of inputs) {
              const label = inp.previousElementSibling?.innerText?.replace("*", "").trim();
              
              let uuid2 = crypto.randomUUID();
              const dataId = inp.getAttribute("data-id");
              let answerValue = inp.value;

              if ((dataId === "image" || dataId === "uimage") && inp.files && inp.files[0]) {
                const file = inp.files[0];
                
                const optimizedBlob = await compressImage(file, 0.7, 1024, 1024, 1 * 1024 * 1024);
                const formData = new FormData();
                formData.append("file", optimizedBlob, file.name);

                try {
                  const response = await fetch("{{ route('upload-asset-image') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                      "X-CSRF-TOKEN": "{{csrf_token()}}"
                    }
                  });

                  const result = await response.json();
                  if (result.uuid) {
                    answerValue = result.uuid;
                    
                  } else {
                    Swal.fire("Error", "Failed to save image.", "error");
                    return;
                  }
                } catch (e) {
                  console.error("Upload failed:", e);
                  Swal.fire("Error", "Error saving image!", "error");
                  return;
                }
              }
              if (label && inp.value) {
                  detailStr += `<b>${label}:</b> ${answerValue}<br>`;
              }
              collection += `
                <input type="hidden" name="collection[${uuid}][${uuid2}][question_id]" value="${dataId}">
                <input type="hidden" name="collection[${uuid}][${uuid2}][answer]" value="${answerValue}">
              `;
          };
          
          window.currentEditingRow.cells[2].innerHTML = detailStr;
          window.currentEditingRow.cells[3].innerHTML = `<td class="d-flex gap-2">
            <button type="button" class="btn btn-danger btn-sm deleteBtn">Delete</button> <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-danger btn-sm editBtn">Edit</button>${collection}</td>
            `;
      }
      
      // Close the modal
      const modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
      modal.hide();
      
      Swal.fire('Success', 'Asset updated successfully!', 'success');
  });

  // Final Submit
  document.getElementById("finalSubmit").addEventListener("click", function() {
      const rows = document.querySelectorAll("#assetsTable tbody tr");
      if (rows.length === 0) {
          e.preventDefault();
          Swal.fire("Warning", "Please add at least one asset!", "warning");
          return;
      }
  });

  async function compressImage(file, quality = 0.7, maxWidth = 1024, maxHeight = 1024, sizeLimit = 1 * 1024 * 1024) {
    if (file.size <= sizeLimit) {
      return file;
    }

    return new Promise((resolve, reject) => {
      const reader = new FileReader();
      reader.readAsDataURL(file);

      reader.onload = event => {
        const img = new Image();
        img.src = event.target.result;

        img.onload = () => {
          // calculate new size (maintaining aspect ratio)
          let width = img.width;
          let height = img.height;
          if (width > maxWidth || height > maxHeight) {
            const scale = Math.min(maxWidth / width, maxHeight / height);
            width *= scale;
            height *= scale;
          }

          // draw to canvas
          const canvas = document.createElement("canvas");
          canvas.width = width;
          canvas.height = height;
          const ctx = canvas.getContext("2d");
          ctx.drawImage(img, 0, 0, width, height);

          // convert to Blob
          canvas.toBlob(
            blob => resolve(blob),
            "image/jpeg",
            quality
          );
        };

        img.onerror = error => reject(error);
      };
    });
  }



</script>

<script>
  // Sub Categories
  const subCategories = {
      @foreach($categories as $category)
      {{$category->id}}: [
        @foreach($category->subcategories as $subcategory)
        "{{$subcategory->name}}",
        @endforeach
      ],
      @endforeach
  };

  // Dynamic questions for each sub-category
  const questions = {
      @foreach($categories as $category)
        @foreach($category->subcategories as $subcategory)
          "{{$subcategory->name}}":[
            @foreach($subcategory->questions as $question)
              {
                qid: "{{$question->id}}",
                label: "{{$question->question}}",
                type: "{{$question->type}}",
                @if($question->options->count())
                  options: [
                    @foreach($question->options as $option)
                    "{{$option->option}}",
                    @endforeach
                  ]
                @endif
              },
            @endforeach
            {
              qid: "latitude",
              label: "Latitude",
              type: "text"
            },
            {
              qid: "longitude",
              label: "Longitude",
              type: "text"
            },
            {
              qid: "image",
              label: "Upload Assets Image",
              type: "file",
              accept: "image/*",
              multiple: true,
              min: 1,
              max: 3,
              addMore: true,
              style: "margin-bottom:10px;"
            },
            {
                label: "Add More Images",
                type: "button",
                class: "btn btn-primary add-more-btn"
            },
            {
              qid: "uimage",
              label: "upload unusable asset image",
              type: "file",
              required: false
            },

          ],
        @endforeach
      @endforeach
      
      
  };
</script>
@endsection
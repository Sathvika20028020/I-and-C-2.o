@extends('pwa.layout.app')
@section('title') Dashboard @endsection
@section('style')
<style>
.font-aneka {
    font-family: 'Anek Latin', sans-serif;
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
</style>
@endsection
@section('content')
<div class="page-title page-title-small">
    <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Asset Form</h2>
    <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
        data-src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"></a>
</div>
<div class="card header-card shape-rounded" data-card-height="90">
    <div class="card-overlay bg-highlight opacity-95"></div>
    <div class="card-overlay dark-mode-tint"></div>
    <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
</div>

<div class="d-flex flex-column gap-2 mt-5 mb-3">
    <div class="card m-2" style="border-radius: 20px;">
        <div class="card-body">
            <h2 class="mb-4 text-center font-aneka">Asset Inventory Form1</h2>

            <form id="assetForm" class="needs-validation" novalidate>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fontsize">District</label>
                        <input type="text" class="form-control" id="district" placeholder="Davangere" readonly>
                    </div>

                    <!-- Category -->
                    <div class="col-md-6">
                        <label class="form-label fontsize">Category</label>
                        <select class="form-select" id="categorySelect" required>
                            <option value="">-- Select Category --</option>
                            <option value="chairs">Chairs</option>
                            <option value="desksTable">Desks / Tables</option>
                            <option value="storageSolutions">Storage Solutions</option>
                            <option value="fixturesAccessories">Fixtures and Accessories</option>
                            <option value="itCommunicationEquipment">IT and Communication Equipment</option>
                            <option value="ElectricalOfficeAppliances">Electrical and Office Appliances</option>
                            <option value="SecuritySystems">Security Systems</option>
                            <option value="HVACPowerBackup">HVAC and Power Backup</option>
                            <option value="IntangibleAssets">Intangible Assets</option>
                        </select>
                    </div>

                    <!-- Sub Category -->
                    <div class="col-md-6">
                        <label class="form-label fontsize">Sub Category</label>
                        <select class="form-select" id="subCategorySelect" required disabled>
                            <option value="">-- Select Sub Category --</option>
                        </select>
                    </div>
                </div>

                <!-- Dynamic Fields -->
                <div id="dynamicFields" class="border rounded p-2 mb-3 bg-white" style="display:none;">
                    <h5 id="formTitle" class="mb-3"></h5>
                    <div id="questionsContainer" class="row g-3 mb-0">
                        <div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success font-aneka mt-3" id="addBtn" type="button">Add</button>
                    </div>
                </div>



            </form>

            <!-- Table -->
            <div class="card" id="assetsTableCard" style="display:none;">
                <div class="card-header text-center font-aneka" style="font-size: 15px;color: black;">
                    <b>Added Assets Table</b>
                </div>
                <div class="card-body p-0">
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

            <div class="text-center mt-4">
                <button class="btn btn-primary font-aneka" id="finalSubmit" style="display:none;">Final Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-aneka">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="newCategory" class="form-control" placeholder="Enter new category">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary font-aneka" data-bs-dismiss="modal"
                    style="border-radius:10px">Cancel</button>
                <button type="button" class="btn btn-primary font-aneka" id="saveCategory"
                    style="border-radius:10px">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- SubCategory Modal -->
<div class="modal fade" id="subCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-aneka">Add New Sub-Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="newSubCategory" class="form-control" placeholder="Enter new sub-category">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary font-aneka" data-bs-dismiss="modal"
                    style="border-radius:10px">Cancel</button>
                <button type="button" class="btn btn-success font-aneka" id="saveSubCategory"
                    style="border-radius:10px">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// Sub Categories
const subCategories = {
    chairs: ["Wooden Chairs", "Steel Chairs", "Plastic Chairs"],
    desksTable: ["Office Desks", "Executive Desks", "Computer Tables", "Meeting Tables"],
    storageSolutions: ["Filing Cabinets", "Lockers", "Almirah", "Open Shelving Units", "Wooden Cupboards",
        "Steel  Cupboards"
    ],

    fixturesAccessories: ["Partitions and Panels", "Boards"],
    itCommunicationEquipment: ["Desktop", "Computers", "Laptops", "Monitors ", "Peripherals",
        "Servers and Network Racks", "Routers", "Switches", "Firewalls", "Printers", "Scanners",
        "Multifunction Devices", "Telecommunication Devices"
    ],
    ElectricalOfficeAppliances: ["Air Conditioners", "Refrigerators, Water Dispensers, and Microwaves",
        "Ceiling Fans", "Pedestal Fans", "Vacuum Cleaners", "Heaters and Coolers"
    ],
    SecuritySystems: ["CCTV Cameras (with DVR/NVR)", "Biometric Devices", "Fire Alarms/Smoke Detectors"],
    HVACPowerBackup: ["Generators and Inverters", "UPS Systems and Batteries",
        "Solar Panels and Voltage Stabilizers"
    ],
    IntangibleAssets: ["Licensed Software, Patents, and Trademarks"]
};

// Dynamic questions for each sub-category
const questions = {
    "Wooden Chairs": [{
            label: "Number of Wooden Chairs (quantity)1",
            type: "number"
        },
        {
            label: "Year of Purchase",
            type: "year"
        },
        {
            label: "No of chairs in usable condition",
            type: "number"
        },
        {
            label: "No of chairs in not usable condition",
            type: "number"
        },
        {
            label: "Latitude",
            type: "number"
        },
        {
            label: "Longitude",
            type: "number"
        },
        {
            label: "Upload Images",
            type: "file",
            accept: "image/*",
            multiple: true,
            min: 1,
            max: 3,
            addMore: true,
        }

    ],
    "Steel Chairs": [{
            label: "Number of steel chairs (quantity)",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of chairs in usable condition",
            type: "number"
        },
        {
            label: "No of chairs in not usable condition",
            type: "number"
        }
    ],
    "Plastic Chairs": [{
            label: "Number of plastic chairs (quantity)",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of chairs in usable condition",
            type: "number"
        },
        {
            label: "No of chairs in not usable condition",
            type: "number"
        }
    ],
    "Office Desks": [{
            label: "Number of office desks (quantity)",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of Office Desks in usable condition",
            type: "number"
        },
        {
            label: "No of Office Desks in not usable condition",
            type: "number"
        }
    ],
    "Executive Desks": [{
            label: "Number of executive desks (quantity)",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of Executive Desks in usable condition",
            type: "number"
        },
        {
            label: "No of Executive Desks in not usable condition",
            type: "number"
        }
    ],
    "Computer Tables": [{
            label: "Enter table material",
            type: "text"
        },
        {
            label: "Number of computer tables (quantity)",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of computer tables in usable condition",
            type: "number"
        },
        {
            label: "No of computer tables in not usable condition",
            type: "number"
        }
    ],
    "Meeting Tables": [{
            label: "Enter table material",
            type: "text"
        },
        {
            label: "Number of meeting tables (quantity)",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of meeting tables in usable condition",
            type: "number"
        },
        {
            label: "No of meeting tables in not usable condition",
            type: "number"
        }
    ],
    "Filing Cabinets": [{
            label: "Number of filing cabinets (quantity)",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of filing cabinets in usable condition",
            type: "number"
        },
        {
            label: "No of filing cabinets in not usable condition",
            type: "number"
        }
    ],
    "Lockers": [{
            label: "Number of lockers (quantity)",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of lockers in usable condition",
            type: "number"
        },
        {
            label: "No of lockers in not usable condition",
            type: "number"
        }
    ],
    "Almirah": [{
            label: "Enter almirah material",
            type: "text"
        },
        {
            label: "Number of almirah (quantity)",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of almirah in usable condition",
            type: "number"
        },
        {
            label: "No of almirah in not usable condition",
            type: "number"
        }
    ],
    "Open Shelving Units": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of open shelves in usable condition",
            type: "number"
        },
        {
            label: "No of open shelves in not usable condition",
            type: "number"
        }
    ],
    "Wooden Cupboards": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of wooden cupboards in usable condition",
            type: "number"
        },
        {
            label: "No of wooden cupboards in not usable condition",
            type: "number"
        }
    ],
    "Steel  Cupboards": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "No of steel cupboards in usable condition",
            type: "number"
        },
        {
            label: "No of steel cupboards in not usable condition",
            type: "number"
        }
    ],
    "Partitions and Panels": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Boards": [{
            label: "Board Type",
            type: "select",
            options: ["Whiteboards", "Display Boards", "Notice Boards", "Bulletin Boards"]
        },
        {
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Desktop": [{
            label: "Number of quantity",
            type: "number"
        },

        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },

        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Computers": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Laptops": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Monitors ": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Peripherals": [{
            label: "Peripherals",
            type: "select",
            options: ["keyboards", "mouse", "webcams", "headphones"]
        },
        {
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of purchase",
            type: "year"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Servers and Network Racks": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Routers": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Switches": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Firewalls": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Printers": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Scanners": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Multifunction Devices": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Telecommunication Devices": [{
            label: "Telecommunication Devices",
            type: "select",
            options: ["Landline phones", "IP phones", "VC systems"]
        },

        {
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Air Conditioners": [{
            label: "Air Conditioners",
            type: "select",
            options: ["Split", "Window / Central"]
        },
        {
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Refrigerators, Water Dispensers, and Microwaves": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Ceiling Fans": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Pedestal Fans": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Vacuum Cleaners": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Heaters and Coolers": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Ceiling Fans": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "CCTV Cameras (with DVR/NVR)": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Biometric Devices": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Fire Alarms/Smoke Detectors": [{
            label: "Number of quantity",
            type: "number"
        },
        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Generators and Inverters": [

        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "UPS Systems and Batteries": [

        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Solar Panels and Voltage Stabilizers": [

        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],
    "Licensed Software, Patents, and Trademarks": [

        {
            label: "Company / Brand",
            type: "text"
        },
        {
            label: "Version / Model",
            type: "text"
        },
        {
            label: "Year of Purchase",
            type: "number"
        },
        {
            label: "Current condition",
            type: "text"
        },

    ],


};

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

// Render Questions dynamically
document.getElementById("subCategorySelect").addEventListener("change", function() {
    const subCat = this.value;
    const container = document.getElementById("questionsContainer");
    container.innerHTML = "";
    if (subCat && questions[subCat]) {
        document.getElementById("formTitle").textContent = subCat + " Details";
        questions[subCat].forEach((q) => {
            let col = document.createElement("div");
            col.className = "col-md-4";
            if (q.type === "select") {
                let selectOptions = q.options.map(opt => `<option value="${opt}">${opt}</option>`).join(
                    "");
                col.innerHTML = `
            <label class="form-label font-aneka fontsize mb-0">${q.label} <span class="text-danger">*</span></label>
            <select class="form-select font-aneka" required>
                <option value="">-- Select --</option>
                ${selectOptions}
            </select>
            <div class="invalid-feedback mt-0">Please select ${q.label}</div>`;
            } else {
                col.innerHTML = `
            <label class="form-label font-aneka fontsize mb-0">${q.label} <span class="text-danger">*</span></label>
            <input type="${q.type === 'year' ? 'text' : q.type}" class="form-control font-aneka" placeholder="${q.label}" required ${q.type === 'year' ? 'maxlength="4" pattern="^[0-9]{4}$"' : ''}>

            <div class="invalid-feedback mt-0">Please enter ${q.label}</div>`;
            }
            container.appendChild(col);
        });
        document.getElementById("dynamicFields").style.display = "block";
        console.log("ho", dynamicFields)
    } else {
        document.getElementById("dynamicFields").style.display = "none";
    }
});

// Add row
document.getElementById("addBtn").addEventListener("click", function() {
    const form = document.getElementById("assetForm");
    if (!form.checkValidity()) {
        form.classList.add("was-validated");
        return;
    }
    const category = document.getElementById("categorySelect").value;
    const subCategory = document.getElementById("subCategorySelect").value;

    let details = {};
    const inputs = document.querySelectorAll("#questionsContainer input, #questionsContainer select");
    inputs.forEach(inp => {
        const label = inp.previousElementSibling.innerText.replace("*", "").trim();
        details[label] = inp.value;
    });

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
                <td><button type="button" class="btn btn-danger btn-sm deleteBtn">Delete</button></td>
            `;
    tbody.appendChild(row);

    Swal.fire("Success", "Asset added successfully!", "success");

    form.reset();
    form.classList.remove("was-validated");
    document.getElementById("subCategorySelect").disabled = true;
    document.getElementById("dynamicFields").style.display = "none";
});

// Delete row with confirmation
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

// Final Submit
document.getElementById("finalSubmit").addEventListener("click", function() {
    Swal.fire("Submitted!", "All assets submitted successfully.", "success");
});
</script>

@endsection
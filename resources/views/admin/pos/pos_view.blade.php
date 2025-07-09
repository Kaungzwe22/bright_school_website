
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.printPage.js"></script>
    <script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
    <title>Voucher Printing Form</title>
</head>


<style>
    .cancel_btn{
        background: #ff6c0f;
        color: white;
        border: none;
        outline: none;
        margin-top: 10px;
        padding: 5px 15px;
        border-radius: 10px;
    }
    .voucher span,.voucher_date span{
        font-size: 16px;
        font-weight: bold;
    }
    label{
        font-size: 18px;
        color: black;
    }
    input{
        border: 1px solid #ff6c0f;
    }
    table,tr,td,th{
        font-size: 18px;
        color: black;
    }
    .cellClass_id{
        display: none;
    }
    #change_Ui{
        background-color: #ff6c0f;
        border: 2px solid #ff6c0f;
        color: white;
    }
    #change_Ui:hover{
        color: #ff6c0f;
        background: none;
    }
</style>
<body>

<div class="container-fluid px-5">
    <div style="background-color: #ff6c0f; color:white; padding: 10px;" class="card-header mt-2 d-flex align-items-center justify-content-center">
        <h4>POS System</h4>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-xl-3 col-12">
            <div class="card">

                <div class="card-body">
                    <form id="voucherForm">
                        <!-- Voucher Number and Date -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label class="fs-6" for="voucherNumber">Voucher Number:</label>
                                <input required type="text" id="voucherNumber" class="form-control" value="{{ rand(1000, 9999) }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="fs-6" for="voucherDate">Voucher Date:</label>
                                <input required type="date" id="voucherDate" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                            </div>
                        </div>
                        <!-- Student Names -->
                        <div class="form-group mb-3">
                            <label class="fs-6" for="studentNames">Student Names</label>
                            <input required type="text" id="studentNames" class="form-control">
                        </div>

                        <!-- Class Selection -->
                        <div class="form-group mb-3">
                            <label class="fs-6" for="classSelect">Select Course:</label>
                            <select id="classSelect" class="form-control" onchange="updatePrice()">
                                {{-- @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" data-normal-price="{{ $course->normal_price }}" data-special-price="{{ $course->special_price }}">
                                        {{ $course->name }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>

                        <!-- Times Selection -->
                        <div class="form-group mb-3">
                            <label class="fs-6" for="sectionSelect">Select Time:</label>
                            <select id="sectionSelect" class="form-control" onchange="updatePrice()">
                                {{-- @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">
                                        {{ $section->name }} {{ $section->start_hour }}:{{ $section->start_minute }}-{{ $section->end_hour }}:{{ $section->end_minute }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="form-group mb-3 d-none">
                            <label class="fs-6" for="studentNames">Course Id</label>
                            <input required type="text" id="classid" class="form-control">
                        </div>

                        <div class="form-check mb-3 d-flex">
                            <div>
                                 <input class="form-check-input" type="radio" name="category" id="category1" value="normal" checked onchange="updatePrice()">
                                <label class="fs-6" class="form-check-label" for="category1">
                                    Normal Fees
                                </label>
                            </div>

                            <div class="ms-5">
                                <input style="" class="form-check-input" type="radio" name="category" id="category2" value="special" onchange="updatePrice()">
                                <label class="fs-6" style="" class="form-check-label" for="category2">
                                    Special Fees
                                </label>
                            </div>

                        </div>

                        <!-- Class Start Date -->
                        <div class="form-group mb-3">
                            <label class="fs-6" for="classStartDate">Course Start Date:</label>
                            <input required type="date" id="classStartDate" class="form-control">
                        </div>


                        <!-- Class Price -->
                        <div class="form-group mb-3">
                            <label class="fs-6" for="classPrice">Course Fee:</label>
                            <input required type="number" id="classPrice" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-group">
                                <a href="javascript:history.back()"><button type="button" style="border: 1px solid #ff6c0f; color: #ff6c0f" class="btn">Back</button></a>
                            </div>
                            <!-- Submit Button -->
                            <div class="form-group">
                                <button id="change_Ui" type="button" style="float: right;" class="btn" onclick="generateTable()">Add Voucher Record</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-12">
            <form id="form1" method="POST">
                @csrf
            <div class="vou d-flex align-items-center justify-content-between mb-3">
                <div class="voucher_show">
                    <span>Voucher:</span>
                    <span id="voucher_no">0</span>
                </div>
                <div class="voucher_date_show">
                    <span>Voucher Date:</span>
                    <span class="vouc_date" id="voucher_date"></span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="fs-6 text-black">Student Name</th>
                            <th class="fs-6 text-black">Start Date</th>
                            <th class="fs-6 text-black">Time</th>
                            <th class="fs-6 text-black">Course</th>
                            <th class="fs-6 text-black">Fees</th>
                            <th class="fs-6 text-black">Cancel</th>
                        </tr>

                    </thead>
                    <tbody id="tableBody">

                    </tbody>
                </table>
            </div>

            <div class="balance d-flex justify-content-end mb-3">
                <div class="form-row d-inline-block">
                    <div class="d-flex justify-content-between align-items-center mb-1 form-group col-md-12">
                        <label class="fs-6" for="totalPrice">Total Fee:</label>
                        <input required type="text" id="totalPrice" class="form-control w-50" readonly>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-1 form-group col-md-12">
                        <label class="fs-6" for="discount">Discount:</label>
                        <input required type="text" id="discount" class="form-control w-50" value="0" onchange="updateTotalPrice()" onblur="updateTotalPrice()">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-1 form-group col-md-12">
                        <label class="fs-6" for="subtotal">Paid:</label>
                        <input required type="text" id="subtotal" class="form-control p w-50" value="0" onchange="updateTotalPrice()" onblur="updateTotalPrice()">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-1 form-group col-md-12">
                        <label class="fs-6" for="Balance">Balance:</label>
                        <input required type="text" id="balance" class="form-control b w-50" readonly>
                    </div>
                    <div class="d-none justify-content-between align-items-center mb-1 form-group col-md-12">
                        <label class="fs-6" for="status">Status:</label>
                        <input required type="text" id="status" name="status" class="form-control b w-50" value="0">
                    </div>

                </div>
            </div>
            <div style="float: left;" class="form-group">
                <button style="background-color:#ff6c0f; color:white;" type="button" id="submitButton" class="btn">Save To Database</button>
            </div>
            <div style="float: right;" class="form-group">
                <a id="change_Ui" href="{{route('admin_print_view')}}" class="btnpri btn">Print</a>
            </div>
        </form>

        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




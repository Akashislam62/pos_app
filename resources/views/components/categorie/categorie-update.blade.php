<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Categorie</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Categorie Name *</label>
                                <input type="text" class="form-control" id="categorieNameUpdate">

                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Update()" id="update-btn" class="btn btn-sm  btn-success" >Update</button>
                </div>
            </div>
    </div>
</div>



<script>
    async function FillUpUpdateForm(id){
        document.getElementById('updateID').value=id;
        showLoader();
        let res= await axios.post("/categorie-by-id",{id:id})
        hideLoader();
        document.getElementById('categorieNameUpdate').value=res.data['name'];
    }

    
    async function Update(){
        let categorieName= document.getElementById('categorieNameUpdate').value;
        let updateID= document.getElementById('updateID').value;
        if(categorieName.length === 0) {
            errorToast("Categories Requered !")
        }
        else{
            document.getElementById('update-modal-close').click();
            showLoader();
            let res= await axios.post("/update-categorie",{name:categorieName,id:updateID})
            hideLoader();
            if(res.status===200 && res.data===1){
                successToast("Update Request Success !")
                await getList();
            }
            else{
                errorToast("Update Request Fail !")
            }
        }
    }
</script>
import swal from 'sweetalert';
window.Vue = require('vue');
import axios from 'axios';

const app = new Vue({
	el: '#shopkeeper',
    data:{
      shopkeeperVal:{},
      shopkeeperValidationError:{},
      allshopkeeper : {},
      editValidationError: {},
      eshopkeeperVal : {},
      eshopkeeperValidationError : {},
    },
    methods:{
    	addshopkeepermodal()
    	{
    		$('#addshopkeeper').modal('show');

    	},
    	 getallshopkeeper()
      	{
	        let _this = this;
	        let getAllshopkeeperurl = $('#urlshopkeeperget').val();
	        axios.get(getAllshopkeeperurl)
	        .then(function(response){
	          _this.allshopkeeper = response.data;
	          

	        }).
	        catch(function(error){

	        });
		},
    	addShopkeeper()
     	{
      	//alert("hell world");
         let shopkeeperAddUrl = $('#urlshopkeeperadd').val();
         console.log(shopkeeperAddUrl);
         let _this = this;
         console.log(_this.shopkeeperVal);
       axios.post(shopkeeperAddUrl,_this.shopkeeperVal)
        .then(function(response){
          if(response.status == 200 && response.data == 'shopkeeperadded')
          {
              _this.shopkeeperVal = {};
              $('#addshopkeeper').modal('hide');
              _this.getallshopkeeper();

              swal("Shopkeeper added Successfully!", "", "success");
          }
        }).
        catch(function(error){
        	 _this.shopkeeperValidationError = error.response.data.errors;
          console.log(_this.shopkeeperValidationError);
        });
      },
      editshopkeeperModal()
      {
        var oTable = $('#society-table').dataTable();

        var row;
        let _this = this;
        if(event.target.tagName == "BUTTON")
       row = event.target.parentNode.parentNode;
        else if(event.target.tagName == "I")
       row = event.target.parentNode.parentNode.parentNode;
        $('#shopkeepereditmodal').modal('show');
        $('#euserid').val(row.cells[2].innerHTML);
        $('#estorename').val(row.cells[3].innerHTML);
         $('#emobile').val(row.cells[4].innerHTML);
        //console.log(_this.eshopkeeperVal);
       
        // $('#editcityid').val(row.cells[1].innerHTML);
        // $('#editcityname').val(row.cells[2].innerHTML);
      },

      shopkeeperEditSubmit()
      {
      	let _this = this;
      	let editshopkeeper = {};
      	let userId = $('#euserid').val();
      	let shopkeeperAddUrl = $('#urlshopkeeperedit').val();

      	 editshopkeeper.storeadmin = $('#estorename').val();
      	 editshopkeeper.mobile = $('#emobile').val();

      	axios.post(shopkeeperAddUrl+'/'+userId,editshopkeeper)
        .then(function(response){
          if(response.status == 200 && response.data == 'shopkeeperupdated')
          {
            _this.getallshopkeeper();
            $('#shopkeepereditmodal').modal('hide');
            swal("Shopkeeper Updated Successfully!", "", "success");
          }
        }).
        catch(function(error){

        }); 
      
      },
      deleteShopkeeper(id)
      {
        let _this = this;
        let deleteShopkeeperUrl = $('#urlshopkeeperdel').val();
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this Shokeeper!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            axios.get(deleteShopkeeperUrl+'/'+id)
            .then(function(resp){
              let respnc = resp.data;
              if(respnc == 'shopkeeperdeleted')
              {
                //swal("Coupon deleted Successfully!", "", "success");
                  _this.getallshopkeeper();
                  swal("Shopkeeper has been deleted!", {
                    icon: "success",
                  });
              }
            }).
            catch(function(resp){
              console.log(resp);
            })

          } else {
            //swal("Your imaginary file is safe!");
          }
        });
      }

    },
    mounted(){
      this.getallshopkeeper();

    },
    beforeDestroy()
    {

    }


});
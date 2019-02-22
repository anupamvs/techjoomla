<div class="col s10 m8 l6 xl6 offset-s1 offset-m2 offset-l3 offset-xl3">
  	<div class="row">
        <div class="input-field col s12">
        	 <input id="product_name" name="product_name" placeholder="" type="text">
        	 <label for="product_name">Product Name</label>
        </div>
        <div class="input-field col s12">
          	<input id="product_price" name="product_price" placeholder="" type="text">
          	<label for="product_price">Price</label>
        </div>
        <div class="input-field col s12">
            <select id="product_category" class="">
              <option value='' disabled selected id='temp-new'>Select Category</option>
            </select>
        </div>
        <div class="input-field col s12">
          	<textarea id="product_descrption" name="product_descrption" placeholder="" class="materialize-textarea"></textarea>
          	<label for="product_descrption">Product Description</label>
        </div>
        <div class="col s12 file-field input-field">
            <div class="btn">
              <span>Select</span>
              <input type="file" id="product_image">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Select Image">
            </div>
        </div>
  	</div>
</div>
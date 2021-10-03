<?php require_once(DIR_APPLICATION . 'view/header.php') ?>

<!-- Purchase modal message -->
<div class="modal fade" id="orderMessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Purchase</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Call us for purchase: <a href="tel:+38(012)345-67-89" style="text-decoration: none;">+38 (012) 345-67-89</a></p>
        <p>Work hours: <span class="fw-bold">9:00 - 20:00</span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid p-4">  
    <div class="row">
      <div class="col-sm-3">
        <ul class="list-group mb-2" id="categorieslist">
          <?php
            foreach($data['categories'] as $category) {
              echo '<li class="list-group-item"><a' . ' data-id=' . $category['id'] . ' href="' . HTTP_SERVER . 'index.php?route=category&id=' . $category['id'] . '" class="w-100">' . $category['name'] . ' (' . $category['total_products'] . ')' . '</a></li>';
            }
          ?>
        </ul>
      </div>
  
        <div class="col-sm-9">
          <div class="row row-cols-1">
            <div class="col px-4">
              <span>Sort by:</span>
              <select name="sortby" id="sortby">
                <option value="price">Price</option>
                <option value="name">Name</option>
                <option value="date">Newest</option>
              </select>
            </div>
            <div class="col p-4">
                <div id="products" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
                  <?php
                    foreach($data['products'] as $product) {
                      echo '
                      <div class="col">
                        <div class="card m-1 text-center">
                          <img src="' . URI_IMAGE . $product['image']. '" class="card-img-top">
                          <div class="card-body">
                            <p class="card-title fw-bold my-0">'. $product['name'] . '</p>
                            <p class="text-primary fw-bold my-0 py-0">' . $product['price'] . ' UAH</p>
                            <p class="text-muted my-0 py-0">' . $product['date'] . '</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderMessage">
                              Buy now
                            </button>
                          </div>
                        </div>
                      </div>
                      ';
                    }
                  ?>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
<script>
  // Initial settings on page loaded
  $(document).ready(function() {
    let uri_params = new URLSearchParams(document.location.search.slice(1))

    if(uri_params.get('sort')) {
      $('#sortby > option').each((index, option) => {
        if($(option).val() == uri_params.get('sort')) {
          $(option).attr('selected', 'selected')
        }
      })
    }

    if(uri_params.get('route') == 'category' && uri_params.get('id')) {
      $('#categorieslist > li > a').each((index, element) => {
        if(element.dataset.id == uri_params.get('id')) {
          $(element).parent().css('background-color', 'lightblue')
          $(element).attr('selected', 'selected')
        }
      })
    }
  })

  // Process fetched JSON with products
  function addProductsToHTML(data) {
        $('#products').html('')
        data.forEach( (product) => {
          $('#products').append('<div class="col"><div class="card m-1 text-center">'
          + '<img src="<?= URI_IMAGE ?>' + product.image + '" class="card-img-top">'
          + '<div class="card-body">'
          + '<p class="card-title fw-bold my-0">' + product.name + '</p>'
          + '<p class="text-primary fw-bold my-0 py-0">' + product.price + ' UAH</p>'
          + '<p class="text-muted my-0 py-0">' + product.date + '</p>'
          + '<a href="#" class="btn btn-primary">Buy now</a>'
          + '</div></div></div>')
        })
      }
  
  // Click category and reload products
  $('#categorieslist > li > a').each( (index, element) => {
    element.onclick = () => {
      event.preventDefault()
      $('#categorieslist > li').css('background-color', '')
      
      let uri = ''
      
      if (element.getAttribute('selected')) {
        $(element).removeAttr('selected')
        $(element).parent().css('background-color', 'white')
        uri = document.location.origin + document.location.pathname + '?route=category'
      }
      else {
        $('#categorieslist > li > a').removeAttr('selected')
        $(element).attr('selected', 'selected')
        $(element).parent().css('background-color', 'lightblue')

        uri = element.getAttribute('href')
      }
      
      uri += '&sort=' + $('#sortby').val()

      fetch(uri.replace('route=category', 'route=category/getProductsJson'))
      .then((response) => {
        return response.json();
      })
      .then( (data) => addProductsToHTML(data) )

      window.history.replaceState('a', 'a', uri)
    }
  })

  // Sort by
  $('#sortby').on('change', (option) => {
    let uri_params = new URLSearchParams(document.location.search.slice(1))
    uri_params.delete('sort')
    
    let uri = document.location.origin + document.location.pathname + '?' 
    + uri_params.toString() 
    + '&sort=' + $('#sortby').val();
    fetch(uri + '&route=category/getProductsJson')
    .then((response) => {
      return response.json();
    })
    .then( addProductsToHTML)
    window.history.replaceState('a', 'a', uri.replace('?&', '?'))
  })

</script>

<?php require_once(DIR_APPLICATION . 'view/footer.php') ?>

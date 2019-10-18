<?php if( !empty($_SESSION['cart']) ) : ?>
 <div class="table-resposive">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Imeges: </th>
          <th>Name: </th>
          <th>Quatity: </th>
          <th>Price: </th>
          <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($_SESSION['cart'] as $id => $elem) : ?>
        <tr>
          <td><a href="product/<?= $elem['alias'] ?>"><img class="img-cart" src="images/<?= $elem['img'] ?>" alt="img"></a></td>
          <td><a href="product/<?= $elem['alias'] ?>"><?= $elem['title'] ?></a></td>
          <td><?= $elem['qty'] ?></td>
          <td><?= $elem['price'] ?></td>
          <td><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del_item" aria-hidden="true"></span></td>
        </tr>
        <?php endforeach; ?>
        <tr>
          <td>Result:</td>
          <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty']?></td>
        </tr>
        <tr>
          <td>Summ:</td>
          <td colspan="4" class="text-right cart-summ"><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.summ'] . $_SESSION['cart.currency']['symbol_right'] ?></td>
        </tr>
      </tbody>
  </table>
 </div>
<?php else : ?>
  <h3>Корзина пустая</h3>
<?php endif; ?>
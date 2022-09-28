<?php /** @var array $data */
foreach ($data as $item): ?>

        <div>
            <h2 id="carName"><?php echo $item['title'] ?> </h2>
            <ul style="list-style-type: none; padding-left: 0">
                <li> <?php echo $item['description'] ?></li>
                <li>Price: <?php echo $item['price']/100 ?></li>
                <li>City <?php echo $item['city'] ?></li>
                <li>Contact phone: <?php echo $item['phone_number'] ?></li>
                <li>Created at: <?php echo $item['created_at'] ?></li>
                <li>Created at: <?php echo $item['updated_at'] ?></li>
            </ul>
        </div>
<?php endforeach; ?>
<header>
    <nav style="display: flex; flex-direction: column;justify-content: center;
     align-items: center; height: 15vh;background-color: antiquewhite">

        <a href="#" style="color: blueviolet; font-size: 20px; font-weight: bold"> Ads_website_auto</a>

        <div style="display: flex; align-content: space-between; justify-content: space-around; width: 100%; padding: 2vh ">
            <a href="#" style="color: blueviolet">Create new ads </a>
            <a href="/list" style="color: blueviolet">List ads </a>
            <a href="/login" style="color: blueviolet">Logout </a>
            <a href="/registration" style="color: blueviolet">Register </a>
            <a href="/registration" style="color: blueviolet">My Ads </a>
            <a href="/registration" style="color: blueviolet">Saved Ads </a>

            <p>
                <?php
                echo $_POST['email'];
                ?>
            </p>
        </div>
    </nav>

</header>
<main>
    <?php if (isset($inner)): ?>
        <?php /** @var string $inner */
        require $inner; ?>
    <?php endif; ?>
</main>

<h3>New ad</h3>
<form action="/ads/create" method="POST">
    <div style="display: flex; flex-direction: column; width: 20vh">
        <input type="text" name="title" placeholder="title" required/>
        <input type="text" name="description" placeholder="description" required/></textarea>
        <input type="text" name="price" placeholder="price" required/>
        <input type="text" name="city" placeholder="city" required/>
        <input type="text" name="phone_number" placeholder="Phone number"/>
        <input type="submit"/>
    </div>
</form>


<h2>Update</h2>
<form method="POST" action="update">
    @csrf
    <input type="hidden" name="_method" value="put">
    <input type="text" name="name" id="" placeholder="Tên User">
    <input type="submit" name="" id="" value="submit">
</form>
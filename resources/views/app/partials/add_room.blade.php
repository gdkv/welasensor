<h1>Add zone</h1>
<div class="form-content">
    <form class="" action="{{ route('zone_add') }}" method="POST">
        @csrf
        <div class="form-row">
            <input placeholder="Zone name" type="text" name="name" required/>
        </div>
        <div class="form-row">
            <input placeholder="Description text" type="text" name="description" />
        </div>

        <button type="submit">Add</button>
    </form>
</div>

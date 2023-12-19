<div>
    <form class="form_contant" wire:submit="save">
        <fieldset class="row">
            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-2">
                <input class="field_custom" placeholder="Name" type="text" wire:model.live="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-2">
                <input class="field_custom" placeholder="ID number" type="text" name="id_number"
                    wire:model.live="id_number">
                @error('id_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2">
                <input class="field_custom" placeholder="Email adress" type="email" wire:model.live="email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2">
                <textarea class="field_custom" placeholder="Messager" wire:model.blur="message"></textarea>
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="center"><button class="read_more_bt" type="submit">SUBMIT NOW</button></div>
        </fieldset>
    </form>
</div>

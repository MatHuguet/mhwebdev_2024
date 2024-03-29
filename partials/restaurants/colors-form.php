<form action="/demos/compte/titre&menu" method="get" class="form-colors">
    <fieldset>
        <input type="text" name="restaurant_id" value="<?= $id ?>" hidden />
        <div class="input">
            <label for="maincolor">Couleur principale :
            </label>
            <input type="color" name="main-color" id="maincolor" value="#ffffff" />
        </div>

        <input type="color" name="second-color" id="getsecondcolor" value="#ffffff" hidden />

        <div class="input">

            <label for="brandcolor">Couleur de l'écriteau :
            </label>
            <input type="color" name="brand-color" id="brandcolor" value="#ffffff" />
        </div>
        <div class="input">

            <label for="doormaincolor">Porte :
            </label>
            <input type="color" name="door-color" id="doormaincolor" value="#ffffff" />
        </div>
        <input type="color" name="second-door-color" id="getseconddoorcolor" value="#ffffff" hidden />

        <div class="input">

            <label for="moulurescolor">Moulures :
            </label>
            <input type="color" name="moulures-color" id="moulurescolor" value="#ffffff" />
        </div>

        <div class="input">

            <label for="doormaincolor">Bordures de moulures :
            </label>
            <input type="color" name="borders-moulures-colors" id="bordermoulurescolors" value="#ffffff" />
        </div>

        <div class="input">

            <label for="doorpoignee">Poignée :
            </label>
            <input type="color" name="poignee-color" id="doorpoignee" value="#ffffff" />
        </div>
    </fieldset>
    <input class="btn submit-btn" type="submit" name="color-submit" value="valider et passer à l'étape suivante" />


</form>
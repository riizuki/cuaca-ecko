<div class="search-form">
    <form method="GET" action="" class="d-flex gap-2">
        <div class="flex-grow-1">
            <input type="text" class="form-control form-control-lg" name="city" placeholder="Cari nama kota..." value="<?= htmlspecialchars($city) ?>" required>
        </div>
        <div>
            <select name="days" class="form-select form-select-lg">
                <?php for ($d = 1; $d <= 7; $d++): ?>
                    <option value="<?= $d ?>" <?= ($d == $days) ? 'selected' : '' ?>>
                        <?= $d ?> hari
                    </option>
                <?php endfor; ?>
            </select>
        </div>
        <div>
            <button class="btn btn-primary btn-lg" type="submit">Cari</button>
        </div>
    </form>
</div>

<?php
$fonctions = [regex]::Matches((Get-Content ".\fonctions.php" -Raw), 'function\s+([a-zA-Z_][a-zA-Z0-9_]*)\s*\(') | ForEach-Object { $_.Groups[1].Value }

Get-ChildItem -Filter *.php -File | Where-Object { $_.Name -ne "fonctions.php" } | ForEach-Object {
    $fichier = $_.FullName
    $contenu = Get-Content $fichier -Raw

    foreach ($fonction in $fonctions) {
        $contenu = $contenu -replace "(?<!function\s)\b$([regex]::Escape($fonction))\s*\(\s*(?!\$bddr\b)", "$fonction(`$bddr, "
    }

    Set-Content $fichier $contenu -Encoding UTF8
}
?>
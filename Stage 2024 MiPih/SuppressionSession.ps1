
$logFilePath = "C:\Windows\System32\GroupPolicy\User\Scripts\Logon\SuppressionUtilisateurLogs.log"
$ErrorActionPreference = "Stop"


Start-Transcript -Path $logFilePath -Append

try {
    $currentUserProfile = $env:USERPROFILE

    $deletedUserNames = @()

    Get-CimInstance -ClassName Win32_UserProfile | Where-Object { $_.LocalPath -like '*\Users\*' -and $_.LocalPath -ne $currentUserProfile } | ForEach-Object {
        $deletedUserNames += $_.LocalPath
        Remove-CimInstance -InputObject $_ -ErrorAction Stop
    }


    Write-Output "Utilisateurs supprimés : $($deletedUserNames -join ', ')"
}
catch {

    Write-Error "Erreur : $_"
}
finally {

    Stop-Transcript
}
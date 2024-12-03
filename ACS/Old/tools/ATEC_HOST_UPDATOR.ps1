# Check if the script is running as administrator
if (-not ([Security.Principal.WindowsPrincipal][Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Write-Warning "This script must be run as an administrator. Please run PowerShell as administrator and then re-run this script."
    exit
}

# Specify the path to the hosts file
$hostsFilePath = 'C:\Windows\System32\drivers\etc\hosts'

# Add entries to the hosts file
Add-Content -Path $hostsFilePath -Value "`n192.168.5.9 support.atecmes.com"
Add-Content -Path $hostsFilePath -Value "`n192.168.5.9 prod.atecmes.com"
Add-Content -Path $hostsFilePath -Value "`n192.168.1.21 ispl-fs.atecmes.com"


Write-Host "Entries added to the hosts file successfully!"

# ===== Tools ==================================================================
alias devices='sudo blkid -o list -w /dev/null '

# ===== ===== Web ==============================================================
alias index='php public/index.php '

# ===== ===== ===== Composer ==================================================
alias ci='composer install '
alias cu='composer update '
alias cr='composer require '
alias crd='composer require --dev '
alias cda='composer dump-autoload '

# ===== Utils ==================================================================
alias ll='ls -lash '
alias clip='xclip -sel clip '
alias ip4='curl "https://v4.ident.me/" && echo '
alias ip6='curl "https://v6.ident.me/" && echo '
alias man-packages="comm -23 <(aptitude search '~i !~M' -F '%p' | sed "'"s/ *$//"'" | sort -u) <(gzip -dc /var/log/installer/initial-status.gz | sed -n 's/^Package: //p' | sort -u)"
alias bc='bc -l '

# ===== Misc ===================================================================
alias ss='cmatrix -b -u 10 -s -C green '

# ===== Laziness ===============================================================
alias aliases='vi ~/.bash_aliases'
alias aliases-s='. ~/.bash_aliases'
alias zrc='vi ~/.zshrc '
alias e='exit '
alias zs='. ~/.zshrc '


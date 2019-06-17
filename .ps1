#!/bin/bash

parse_git_branch() {
    git branch 2> /dev/null | sed -e '/^[^*]/d' -e 's/* \(.*\)/ (\1)/'
}

UbuntuDefault_PS1="\[\e]0;\u@\h: \w\a\]${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\] \$"

MyRaspberry_PS1="\[\033[01;32m\]\u\[\033[1;37m\]@\[\033[38;2;181;17;64m\]\h\[\033[1;37m\]:\[\033[01;34m\]\w\[\033[00m\]\[\033[32m\]\[\033[32m\]$(parse_git_branch) \[\033[2;37m\]$\[\033[00m\] "

export PS1=$MyRaspberry_PS1


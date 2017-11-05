#!/bin/bash
IP=$1
ping -c1 $1
echo $?
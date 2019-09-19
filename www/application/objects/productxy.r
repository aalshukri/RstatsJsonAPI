#!/usr/bin/env Rscript
#
# Product X Y
#
args = commandArgs(trailingOnly=TRUE)

x <- as.numeric(args[1])
y <- as.numeric(args[2])

z <- x*y

#print(x)
#print(y)
print(z)

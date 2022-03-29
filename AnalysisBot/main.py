from purify import arrangee

while True:
    lines = lines = open(r'{}'.format(input("Enter the file path: ")),"r",encoding="utf-8").readlines()
    gender = input("Enter the gender: ")
    group = input("Enter the group: ")
    sep = input("Enter the separator: ")
    arrangee(lines, gender, group, sep)

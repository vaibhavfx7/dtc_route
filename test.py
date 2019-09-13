al=[[0]*10]*10
i=0
for i in range(1,len(al)):
    al[0][i]=i
for i in range(len(al)):
    for j in range(len(al)):
        print(al[i][j],end="  ,  ")
    print()
print(al[3][2])
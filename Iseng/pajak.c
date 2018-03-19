#include <stdio.h>

int main()
{
    long int a, c;
    double b, sum, pajak, tax, income;
    c=0;
    sum=0;
    while (c<3)
    {
        scanf("%ld %lf", &a, &b);
        sum=sum+a*b;
        c++;
    }
    scanf("%lf", &pajak);
    tax=pajak/100.00*sum;
    income=sum-tax;
    printf("%.2lf %.2lf\n", tax, income);
    return 0;
}

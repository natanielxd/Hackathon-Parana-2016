using System;
using System.Collections.Generic;
using System.Linq;
using System.Linq.Expressions;
using System.Text;
using System.Threading.Tasks;

namespace OlhaObraAPI.Repository.Interface
{
    public interface IBaseRepository<T> where T : class
    {
        IQueryable<T> GetAll();
        IQueryable<T> GetBy(Expression<Func<T, bool>> predicate);
        T GetById(int id);
        void Add(T entity);
        T Delete(int id);
        void Update(T entity);
        void Save();
    }
}

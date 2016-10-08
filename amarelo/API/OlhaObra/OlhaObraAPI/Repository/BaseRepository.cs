using OlhaObraAPI.DataAccess;
using OlhaObraAPI.Repository.Interface;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Linq.Expressions;
using System.Web;

namespace OlhaObraAPI.Repository
{
    public abstract class BaseRepository<T> : IBaseRepository<T> where T : class
    {
        OlhaObraDBEntities _context = new OlhaObraDBEntities();

        public virtual void Add(T entity)
        {
            _context.Set<T>().Add(entity);
        }
        public virtual T Delete(int id)
        {
            T entity = GetById(id);
            if (entity != null)
            {
                _context.Set<T>().Remove(entity);
            }
            return entity;
        }
        public virtual IQueryable<T> GetAll()
        {
            return _context.Set<T>();
        }
        public virtual IQueryable<T> GetBy(Expression<Func<T, bool>> predicate)
        {
            return _context.Set<T>().Where(predicate);
        }
        public virtual T GetById(int id)
        {
            return _context.Set<T>().Find(id);
        }
        public virtual void Update(T entity)
        {
            _context.Entry(entity).State = EntityState.Modified;
        }
        public virtual void Save()
        {
            _context.SaveChanges();
        }
    }
}